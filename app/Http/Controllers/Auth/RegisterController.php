<?php

namespace App\Http\Controllers\Auth;

use App\District;
use App\Http\Controllers\Controller;
use App\Tehsil;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    public function showRegistrationForm(){
        $district = District::orderBy('name','asc')->get();
        $tehsil = Tehsil::orderBy('name','asc')->get();
        return view('auth.register',compact('district','tehsil'));
    }
    public function getTehsil(Request $request){
        $data['tehsil'] = Tehsil::where("district_id",$request->district_id)
                    ->get(["name","id"]);
        return response()->json($data);
    }
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'phone1' => ['required', 'max:15', 'unique:users,phone1'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'district_id' => ['required'],
            'tehsil_id' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'username'=>$data['username'],
            'first_name'=>ucfirst($data['first_name']),
            'last_name'=>ucfirst($data['last_name']),
            'phone1'=>$data['phone1'],
            'district_id'=>$data['district_id'],
            'tehsil_id'=>$data['tehsil_id'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'mandi' => json_encode($data['mandi']??''),
        ]);
        $request = $data['role'];
        $user->roles()->sync($data['role'], $user->id);
        return $user;
    }
}
