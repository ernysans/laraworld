<?php

use ErnySans\Laraworld\Models\TimeZones;
use Illuminate\Support\Facades\Schema;

class TimeZonesTest extends AppTestCase
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
        $timeZones = TimeZones::all();
        $this->assertNotNull($timeZones->count());
    }

}
