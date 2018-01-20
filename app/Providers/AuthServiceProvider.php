<?php

namespace App\Providers;

use Auth;

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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
      $this->registerPolicies();

      Gate::define('show-config', function() {
        if (Auth::user()->role == 'owner') {
          return true;
        }
        if (Auth::user()->role == 'admin') {
          return true;
        }
        return false;
      });

      Gate::define('show-reports', function() {
        if (Auth::user()->role == 'owner') {
          return true;
        }
        if (Auth::user()->role == 'employee') {
          return true;
        }
        return false;
      });

      Gate::define('show-dashboard', function() {
        if (Auth::user()->role == 'owner') {
          return true;
        }
        if (Auth::user()->role == 'employee') {
          return true;
        }
        if (Auth::user()->role == 'admin') {
          return true;
        }
        return false;
      });

      Gate::define('create-user', function() {
        if (Auth::user()->role == 'owner') {
          return true;
        }
        return false;
      });
    }
}
