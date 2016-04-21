<?php

namespace ErnySans\Laraworld;

use ErnySans\Laraworld\Models\Countries;
use ErnySans\Laraworld\Models\Languages;
use ErnySans\Laraworld\Models\TimeZones;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;

class LaraworldServiceProvider extends ServiceProvider
{

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Countries', function() {
            return new Countries;
        });

        $this->app->bind('Languages', function() {
            return new Languages;
        });

        $this->app->bind('TimeZones', function() {
            return new TimeZones;
        });
    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // Countries Migration =========================
        $countries_migration = $this->getTimePath('create_countries_table', 'migrations');

        $this->publishes([
            __DIR__.'/Database/migrations/0000_00_00_000000_create_countries_table.php' => database_path($countries_migration)
        ], 'migrate-countries');

        // Countries Seed ==============================
        $this->publishes([
            __DIR__.'/Database/seeds/CountriesTableSeeder.php' => database_path('seeds/CountriesTableSeeder.php')
        ], 'seed-countries');


        // Languages Migration =========================
        $languages_migration = $this->getTimePath('create_languages_table', 'migrations');

        $this->publishes([
            __DIR__.'/Database/migrations/0000_00_00_000000_create_languages_table.php' => database_path($languages_migration)
        ], 'migrate-languages');

        // Languages Seed ==============================
        $this->publishes([
            __DIR__.'/Database/seeds/LanguagesTableSeeder.php' => database_path('seeds/LanguagesTableSeeder.php')
        ], 'seed-languages');


        // Time Zones Migration ========================
        $time_zones_migration = $this->getTimePath('create_time_zones_table', 'migrations');

        $this->publishes([
            __DIR__.'/Database/migrations/0000_00_00_000000_create_time_zones_table.php' => database_path($time_zones_migration)
        ], 'migrate-time-zone');

        // Time Zones Seed =============================
        $this->publishes([
            __DIR__.'/Database/seeds/TimeZonesTableSeeder.php' => database_path('seeds/TimeZonesTableSeeder.php')
        ], 'seed-time-zone');

    }

    /**
     * Get the date prefix for the migration.
     *
     * @return string
     */
    protected function getDatePrefix()
    {

        return date('Y_m_d_His');
    }

	/**
     * If the file exist retrieve the same name
     *
     * @param $name
     * @return null
     */
    private function getMigrationCurrentName($name) {
        $base = database_path('migrations/****_**_**_******_'.$name.'.php');
        $source = File::glob($base);
        if ($source) {
            return basename($source[0], ".php");
        }

        return null;
    }

    /**
     * Get the full path name to the migration.
     *
     * @param  string  $name
     * @param  string  $path
     * @return string
     */
    protected function getTimePath($name, $path)
    {
        if ($this->getMigrationCurrentName($name)) {
            $txt = $this->getMigrationCurrentName($name);
        }
        else {
            $txt = $this->getDatePrefix().'_'.$name;
        }

        return  $path.'/'.$txt.'.php';
    }
    
}