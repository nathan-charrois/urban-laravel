<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'verified',
        'deleted',
        'confirmation_code'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];
    
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
        
    public function getCreatedAtAttribute($created_at)
    {
        return date('M j, Y', strtotime($created_at));
    }

    public function owns($relation)
    {
        return $relation->user_id == $this->id;
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function regions()
    {
        return $this->hasMany(Region::class);
    }

    public function publish(Region $region)
    {
        return $this->regions()->save($region);
    }
}
