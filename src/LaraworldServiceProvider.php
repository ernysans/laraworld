<?php

namespace ErnySans\Laraworld;

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
        $this->deleteCountriesMigrations();

        $this->publishes([
            __DIR__.'/Database/migrations/0000_00_00_000000_create_countries_table.php' => database_path($countries_migration)
        ], 'migrate-countries');

        // Countries Seed ==============================
        $this->publishes([
            __DIR__.'/Database/seeds/CountriesTableSeeder.php' => database_path('seeds/CountriesTableSeeder.php')
        ], 'seed-countries');


        // Languages Migration =========================
        $languages_migration = $this->getTimePath('create_languages_table', 'migrations');
        $this->deleteLanguagesMigrations();

        $this->publishes([
            __DIR__.'/Database/migrations/0000_00_00_000000_create_languages_table.php' => database_path($languages_migration)
        ], 'migrate-languages');

        // Languages Seed ==============================
        $this->publishes([
            __DIR__.'/Database/seeds/LanguagesTableSeeder.php' => database_path('seeds/LanguagesTableSeeder.php')
        ], 'seed-languages');


        // Time Zones Migration ========================
        $time_zones_migration = $this->getTimePath('create_time_zones_table', 'migrations');
        $this->deleteTimeZonesMigrations();

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
     * Get the full path name to the migration.
     *
     * @param  string  $name
     * @param  string  $path
     * @return string
     */
    protected function getTimePath($name, $path)
    {
        return $path.'/'.$this->getDatePrefix().'_'.$name.'.php';
    }

    /**
     * Publish migrations for testing
     */
    private function deleteTimeZonesMigrations()
    {
        $base = database_path('migrations/****_**_**_******_create_time_zones_table.php');
        $this->deleteMigration($base);
    }

    /**
     * Publish migrations for testing
     */
    private function deleteCountriesMigrations()
    {
        $base = database_path('migrations/****_**_**_******_create_countries_table.php');
        $this->deleteMigration($base);
    }

    /**
     * Publish migrations for testing
     */
    private function deleteLanguagesMigrations()
    {
        $base = database_path('migrations/****_**_**_******_create_languages_table.php');
        $this->deleteMigration($base);
    }

    /**
     * Delete migration match
     * @param $base
     */
    private function deleteMigration($base)
    {
        $source = File::glob($base);
        $route = $source[0];
        File::delete($route);
        $success = File::exists($route);
        $this->assertFalse($success);
    }
    
}