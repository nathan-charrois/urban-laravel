<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * A role has many permissions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
    
    /**
     * Assign permission to a role.
     *
     * @return boolean
     */
    public function assign(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }
}
