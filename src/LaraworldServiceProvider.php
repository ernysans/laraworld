<?php

namespace ErnySans\Laraworld;

use ErnySans\Laraworld\Models\Countries;
use Illuminate\Support\ServiceProvider;

class LaraworldServiceProvider extends ServiceProvider
{
    public function register()
    {
//        $this->app->bind('countries', function() {
//            return new Countries;
//        });
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

        $this->publishes([
            __DIR__ .'/Database/seeds/' => database_path('seeds')
        ], 'seeds');
    }
}