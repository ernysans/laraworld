<?php

use ErnySans\Laraworld\Models\TimeZones;

class TimeZonesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testItFetchesJsonFile()
    {
        $timeZones = TimeZones::allJSON();
        $this->assertNotNull($timeZones);
    }
}
