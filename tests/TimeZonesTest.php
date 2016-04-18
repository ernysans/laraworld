<?php

use ErnySans\Laraworld\Database\seeds\TimeZonesTableSeeder;
use ErnySans\Laraworld\Models\TimeZones;
use Illuminate\Support\Facades\Schema;

class TimeZonesTest extends TestCase
{
	/**
     * Check if JSON file exist
     */
    public function testItFetchesJsonFile()
    {
        $timeZones = TimeZones::allJSON();
        $this->assertNotNull($timeZones);
    }

    /**
     * Check if the table exist
     */
    public function testItCheckForTable()
    {
        $timeZones = Schema::hasTable('time_zones');
        $this->assertTrue($timeZones);
    }

    /**
     * Check if the table was seeded
     */
    public function testItCanSeed()
    {
        $seed = new TimeZonesTableSeeder();
        $seed->run();

        $timeZones = TimeZones::all();
        $this->assertNotNull($timeZones->count());
    }

}
