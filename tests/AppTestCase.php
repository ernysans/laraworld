<?php

use ErnySans\Laraworld\LaraworldServiceProvider;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Console\Command;
use Symfony\Component\Console\Output\ConsoleOutputInterface;


class AppTestCase extends Illuminate\Foundation\Testing\TestCase
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

	/**
	 * Run before every test
	 */
	public function setUp()
	{
		parent::setUp();
	}

	/**
	 * Run after every test
	 */
	public function tearDown()
	{
		//Artisan::call('migrate:reset');
		parent::tearDown();
	}

}