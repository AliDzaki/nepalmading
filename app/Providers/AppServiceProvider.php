<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('admin', function(User $user){
            $user->role == "admin";
        });

        Gate::define('create-mading', function(User $user){
            return in_array($user->role, ['admin', 'pembuat']);
        });

        Gate::define('my-mading', function(User $user){
            return in_array($user->role, ['admin', 'pembuat']);
        });

        Gate::define('user', function(User $user){
            $user->role == "user";
        });
        
        Gate::before(function (User $user, $ability) {
            if ($user->role == 'admin') {
                return true;
            }
        });
        
    }
    
}
