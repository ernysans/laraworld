<?php

namespace ErnySans\Laraworld;

use Illuminate\Support\ServiceProvider;

class LaraworldServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/Database/migrations/' => database_path('migrations')
        ], 'migrations');
    }
}