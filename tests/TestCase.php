<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class TestCase extends Illuminate\Foundation\Testing\TestCase
{

	use WithoutMiddleware, DatabaseMigrations;

	/**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
		$app = require __DIR__.'/../vendor/laravel/laravel/bootstrap/app.php';
        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
        return $app;
    }

	private function createTables()
	{


	}

	/**
	 * Export migrations
	 */
	private function migrateFirst()
	{

		$sourceDir = __DIR__.'/../src/Database/migrations/';

		$destinationDir = database_path('migrations');
		$success = File::copyDirectory($sourceDir, $destinationDir);
		return $success;
	}

	/**
	 * Run before every test
	 */
	public function setUp()
	{
		parent::setUp();
		$this->createTables();
		$this->migrateFirst();
		Artisan::call('migrate');
	}

	/**
	 * Run after every test
	 */
	public function tearDown()
	{
		Artisan::call('migrate:reset');
		parent::tearDown();
	}

}
