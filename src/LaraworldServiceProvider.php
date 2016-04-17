<?php

namespace ErnySans\Countries;

use Illuminate\Support\ServiceProvider;

class CountriesServiceProvider extends ServiceProvider
{
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

        $this->publishes([
            __DIR__ .'/Database/seeds/' => database_path('seeds')
        ], 'seeds');
    }
}