<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //enable/disable documentation per role
        Gate::define('viewLarecipe', function(?User $user, $documentation) {
            //for guest users
            if(empty($user)){
                return false;
            }else{ // for authenticated users
                if($user->can('adminFullApp')){
                    return true;
                }elseif($user->can('adminApp')){
                    return true;
                }elseif($user->can('manageApp')){
                    return true;
                }elseif($user->can('accessAsClient')){
                    return true;
                }
            }
            return false;
        });
    }
}
