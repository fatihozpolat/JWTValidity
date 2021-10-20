<?php

namespace FatihOzpolat\JWTValidity\Providers;

use Illuminate\Support\ServiceProvider;

class JWTValidityProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../Migrations');
    }
}
