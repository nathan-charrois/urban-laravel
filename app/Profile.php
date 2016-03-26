<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'profiles';

    /**
     * Fillable fields for a Profile.
     *
     * @var array
     */
    protected $fillable = [
        'city',
        'name',
        'about'
    ];

   /**
     * A profile is belongs to a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    /**
     * Return email when name has not been set.
     *
     * @return string
     */
    public function getNameOrEmailAttribute()
    {
        if(!$this->user->profile->name) {
            return $this->user->email;
        }
        
        return $this->user->profile->name;
    }
}
