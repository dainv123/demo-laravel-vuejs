<?php

namespace App\Providers;

use App\Models\Permission;

use App\Models\ProductSize;
use App\Policies\ProductSizePolicy;

use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        ProductSize::class => ProductSizePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        Passport::routes();
        
        // Setup superadmin
        // Gate::before(function ($user, $ability) {
        //     if ($user->isSuperAdmin()) {
        //         return true;
        //     }
        // });

        if(! $this->app->runningInConsole()) {
            foreach(Permission::all() as $permission) {
                Gate::define($permission->name, function ($user) use ($permission) {
                    return $user->hasPermission($permission);
                });
            }
        }
    }
   
}
