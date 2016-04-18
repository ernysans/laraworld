<?php

use ErnySans\Laraworld\Database\seeds\CountriesTableSeeder;
use ErnySans\Laraworld\Models\Countries;
use Illuminate\Support\Facades\Schema;

class CountriesTest extends TestCase
{
    /**
     * Check if JSON file exist
     */
    public function testItFetchesJsonFile()
    {
        $countries = Countries::allJSON();
        $this->assertNotNull($countries);
	}

	/**
	 * Check if the table exist
	 */
	public function testItCheckForTable()
	{
		$countries = Schema::hasTable('countries');
		$this->assertTrue($countries);
	}

	/**
	 * Check if the table was seeded
	 */
	public function testItCanSeed()
	{
		$seed = new CountriesTableSeeder();
		$seed->run();

		$countries = Countries::all();
		$this->assertNotNull($countries->count());
	}

}
