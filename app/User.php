<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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
    use Authenticatable, 
        Authorizable, 
        CanResetPassword, 
        SoftDeletes;
        
    /**
     * The attributes that should be muted to dates.
     *
     * @var array
     */
     protected $dates = ['deleted_at'];
    
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
        'deleted_at',
        'token'
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
    
    public function getCreatedAtAttribute($created_at)
    {
        return date('M j, Y', strtotime($created_at));
    }

    public function owns($relation)
    {
        return $relation->user_id == $this->id;
    }
    
    /**
     * A user has many roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    
    /**
     * Check is a user has role(s).
     *
     * @param  string|object $role
     * @return boolean
     */
    public function hasRole($role)
    {
        if(is_string($role)){
            return $this->roles->contains('name', $role);
        }
        
        return !! $role->intersect($this->roles)->count();
    }
    
    /**
     * Assign role(s) to a user.
     *
     * @param  string|object $role
     * @return boolean
     */
    public function assign($role)
    {
        if(is_string($role)) {
            return $this->roles()->save(
                Role::whereName($role)->firstOrFail()
            );
        }
        
        return $this->roles()->save($role);
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
    
    public function confirmEmail()
    {
        $this->verified = true;
        $this->token = null;
        
        $this->save();
    }
}
