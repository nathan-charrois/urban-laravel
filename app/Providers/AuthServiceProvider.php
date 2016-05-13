<?php

namespace App\Providers;

use Schema;
use App\Permission;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        parent::registerPolicies($gate);

        // Providers boot during migration, make sure table exists 
        // before defining gate.
        if(!Schema::hasTable('permissions'))
        {
            return false;
        }

        // Define permissions.
        foreach ($this->getPermissions() as $permission)
        {  
            $gate->define($permission->name, function($user) use($permission)
            {
                return $user->hasRole($permission->roles);
            });
        }
    }
    
    protected function getPermissions()
    {
        return Permission::with('roles')->get();
    }
}
