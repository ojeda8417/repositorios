<?php

namespace App\Providers;

use Auth;
use App\Auth\IntelisisUserProvider;
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
        $this->registerPolicies($gate);

        // Register Intelisis auth provider
        Auth::provider('intelisis',function()
        {
            // Get the Intelisis guard
            $guard = 'intelisis';//$this->app['config']['auth.defaults.guard'];
            $guardConfig = $this->app['config']["auth.guards.{$guard}"];
            $guardProvider = $guardConfig['provider'];
            $model = $this->app['config']["auth.providers.{$guardProvider}.model"];

            return new IntelisisUserProvider($this->app['hash'], $model);
        });
    }
}
