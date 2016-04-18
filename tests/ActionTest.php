<?php

use Illuminate\Support\Facades\File;

class ActionTest extends AppTestCase
{

	/**
	 * Publish migrations for testing
	 */
	public function testPublishMigrations()
	{

		$sourceDir = __DIR__.'/../src/Database/migrations/';

		$destinationDir = database_path('migrations');
		$success = File::copyDirectory($sourceDir, $destinationDir);
		$this->assertTrue($success);
	}

	/**
	 * Publish seeds for testing
	 */
	public function testPublishSeeds()
	{

		$sourceDir = __DIR__.'/../src/Database/seeds/';

		$destinationDir = database_path('seeds');
		$success = File::copyDirectory($sourceDir, $destinationDir);
		$this->assertTrue($success);
	}

}
