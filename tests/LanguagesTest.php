<?php

use ErnySans\Laraworld\Models\Languages;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class LanguagesTest extends AppTestCase
{

	/**
	 * Check if JSON file exist
	 */
	public function testItFetchesJsonFile()
	{
		$collection = Languages::allJSON();
		$this->assertNotNull($collection);
	}

	/**
	 * Publish migrations for testing
	 */
	public function testPublishedMigrations()
	{
		$source = __DIR__ . '/../src/Database/migrations/0000_00_00_000000_create_languages_table.php';
		$destination = database_path('migrations/0000_00_00_000000_create_languages_table.php');
		File::copy($source, $destination);
		$success = File::exists($destination);
		$this->assertTrue($success);
	}

	/**
	 * Publish seeds for testing
	 */
	public function testPublishedSeeds()
	{
		$source = __DIR__ . '/../src/Database/seeds/LanguagesTableSeeder.php';
		$destination = database_path('seeds/LanguagesTableSeeder.php');
		File::copy($source, $destination);
		$success = File::exists($destination);
		$this->assertTrue($success);
	}

	/**
	 * Run migrations
	 * @depends testPublishedMigrations
	 */
	public function testItHasMigrated()
	{
		Artisan::call('migrate');
		$this->assertTrue(true);
	}

	/**
	 * Check if the table exist
	 * @depends testItHasMigrated
	 */
	public function testItCheckForTable()
	{
		$collection = Schema::hasTable('languages');
		$this->assertTrue($collection);
	}

	/**
	 * Seed the table
	 * @depends testPublishedSeeds
	 * @depends testItFetchesJsonFile
	 */
	public function testItHasSeeded()
	{
		Artisan::call('db:seed');
		$this->assertTrue(true);
	}

	/**
	 * Check if the table was seeded
	 * @depends testItHasSeeded
	 */
	public function testItCanSeed()
	{
		$collection = Languages::all();
		$this->assertNotNull($collection->count());
	}

	/**
	 * Publish migrations for testing
	 * @depends testItHasMigrated
	 */
	public function testDeleteMigrations()
	{
		$base = database_path('migrations/****_**_**_******_create_languages_table.php');
		$source = File::glob($base);
		$route = $source[0];
		File::delete($route);
		$success = File::exists($route);
		$this->assertFalse($success);
	}

	/**
	 * Publish seeds for testing
	 * @depends testItHasSeeded
	 */
	public function testDeleteSeeds()
	{
		$source = database_path('seeds/LanguagesTableSeeder.php');
		File::delete($source);
		$success = File::exists($source);
		$this->assertFalse($success);
	}

}
