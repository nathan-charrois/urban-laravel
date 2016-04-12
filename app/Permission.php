<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{   
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permissions';
    
    /**
     * A permission belongs to many roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
