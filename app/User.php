<?php

namespace App;

use App\Notifications\VerifyUserNotification;
use Carbon\Carbon;
use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable implements JWTSubject
{
    use SoftDeletes, Notifiable;

    public $table = 'users';

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'email_verified_at',
    ];

    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'verify',
        'email',
        'address',
        'province_id',
        'district_id',
        'tehsil_id',
        'phone1',
        'phone2',
        'phone3',
        'tel',
        'bio',
        'password',
        'created_at',
        'updated_at',
        'deleted_at',
        'remember_token',
        'email_verified_at',
        'image',
        'subscription',
        'note',
        'days',
        'package_id',
        'expiry',
        'adds',
        'mandi',

    ];
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
 
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function getIsAdminAttribute()
    {
        return $this->roles()->where('id', 1)->exists();
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        self::created(function (User $user) {
            $registrationRole = config('panel.registration_default_role');

            if (!$user->roles()->get()->contains($registrationRole)) {
                $user->roles()->attach($registrationRole);
            }
        });
    }

    // public function userResults()
    // {
    //     return $this->hasMany(Result::class, 'user_id', 'id');
    // }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
    public function package_name()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
    public function district_name()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
    public function tehsil_name()
    {
        return $this->belongsTo(Tehsil::class, 'tehsil_id');
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    
    public function Interview()
    {
        return $this->belongsToMany(Interview::class);
    }
    public function UserResult()
    {
        return $this->belongsToMany(Result::class, 'user_id','id');
    }

    // public function setImageAttribute($file)
    // {
    //     if ($file) {
    //         $upload = 'Images/';
    //         $filename = time() . $file->getClientOriginalName();
    //         $path    = move_uploaded_file($file->getPathName(), $upload . $filename);
    //         $image =  $upload . $filename;
    //         $this->attributes['image'] = $image;
    //     }
    // }

    // public function getImageAttribute($value)
    // {
    //     return $value ? asset('storage/' . $value) : $value;
    // }
}
