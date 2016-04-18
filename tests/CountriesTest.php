<?php

use ErnySans\Laraworld\Models\Countries;

class CountriesTest extends PHPUnit_Framework_TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testItFetchesJsonFile()
    {
        $countries = Countries::allJSON();
        $this->assertNotNull($countries);
	}
}
