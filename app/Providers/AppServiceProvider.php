<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('FarmerCheck', function($user){
            return $user->role ==='Farmer';
        } );
        
        Gate::define('DistributorCheck', function($user){
            return $user->role ==='Distributor';
        } );

        Gate::define('FarmerProductCheck', function($user){
            return $user->username === auth()->user()->username;
        } );
        
    }
}
