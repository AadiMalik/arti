<?php

namespace App\Http\Controllers\Api\Auth;

use App\District;
use App\Http\Controllers\Controller;
use App\Province;
use App\Tehsil;
use App\Traits\ResponseAPI;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    use ResponseAPI;
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(
            'auth:api',
            [
                'except' => [
                    'login',
                    'register',
                    'common',
                    'refresh',
                    'me',
                    'forget'
                ]
            ]
        );
    }

    public function common()
    {
        $previence = Province::orderBy('name', 'ASC')->get();
        $district = District::with('province_name')->orderBy('name', 'ASC')->get();
        $tehsil = Tehsil::with('district_name')->orderBy('name', 'ASC')->get();
        $category[] = [
            [
                "value" => 2,
                "name" => "Zameendar"
            ],
            [
                "value" => 3,
                "name" => "Commession Agent"
            ]
        ];
        $mandi = [
            [
                "value" => "Gala Mandi",
            ],
            [
                "value" => "Sabzi Mandi",
            ],
            [
                "value" => "Mashli Mandi",
            ],
            [
                "value" => "Phool Mandi",
            ]
        ];
        $data = [
            'previence' => $previence,
            'district' => $district,
            'tehsil' => $tehsil,
            'category' => $category,
            'mandi' => $mandi
        ];
        return $this->success(
            "Success!",
            $data
        );
    }
    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users,username',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone1',
            'province_id' => 'required',
            'district_id' => 'required',
            'tehsil_id' => 'required',
            'password' => 'required|confirmed|min:8',
            'role' => 'required'
        ]);

        if ($validator->fails()) {
            $errors = "";

            foreach ($validator->errors()->all() as $message) {
                $errors .= $message;
            }

            return $this->validationResponse($errors);
        }

        $user = new User;
        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone1 = $request->phone;
        $user->province_id = $request->province_id;
        $user->district_id = $request->district_id;
        $user->tehsil_id = $request->tehsil_id;
        $user->mandi = $request->mandi ?? '';
        $user->password = bcrypt($request->password);
        $user->save();

        $user->roles()->sync($request->role, $user->id);

        return $this->success(
            "User Register Successfully!",
            []
        );
    }


    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            $errors = "";

            foreach ($validator->errors()->all() as $message) {
                $errors .= $message;
            }

            return $this->validationResponse($errors);
        }
        if (is_numeric($request->email)) {
            $credentials = ['phone1' => $request->email, 'password' => $request->password];
        } elseif (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $credentials = ['email' => $request->email, 'password' => $request->password];
        } else {
            $credentials = ['username' => $request->email, 'password' => $request->password];
        }

        if ($token = JWTAuth::attempt($credentials)) {
            $user = Auth::user();
            $user->roles;

            $data = [
                'user' => $user,
                'authorisation' => $token
            ];

            return $this->success(
                "User Login Successfully!",
                $data
            );
        } else {
            return $this->error('This credentials is wrong!');
        }
    }

    public function forget(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = "";

            foreach ($validator->errors()->all() as $message) {
                $errors .= $message;
            }

            return $this->validationResponse($errors);
        }
        $user = User::where('email', $request->email)->first();

        if ($user != null) {
            // Available alpha caracters
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

            // generate a pin based on 2 * 7 digits + a random character
            $pin = mt_rand(100, 999)
                . $characters[rand(0, strlen($characters) - 1)]
                . mt_rand(100, 999);

            // shuffle the result
            $code = str_shuffle($pin);
            $user->password = Hash::make($code);
            $user->update();
            $details = [
                'body' => 'Your new password is ' . $code . ', Thank You!'
            ];

            Mail::to($request->email)->send(new \App\Mail\ForgetPassordApi($details));
        } else {
            return $this->error('This email is wrong!');
        }
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return $this->success(
            "Current User Data",
            Auth()->user()
        );
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return $this->success('Successfully logged out', []);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->success(
            "Refresh Token!",
            $this->respondWithToken(Auth()->user())
        );
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return $this->success("Refresh Token", [
            'access_token' => $token
        ]);
    }
}
