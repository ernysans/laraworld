<?php

use ErnySans\Laraworld\Models\Countries;
use Illuminate\Support\Facades\Schema;

class CountriesTest extends AppTestCase
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
		$countries = Countries::all();
		$this->assertNotNull($countries->count());
	}

}
