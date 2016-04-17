<?php

namespace ErnySans\Laraworld\Database\seeds;

use Illuminate\Database\Seeder;
use ErnySans\Laraworld\Models\TimeZones;

class TimeZonesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return  void
     */
    public function run()
    {
        // Empty the table
        TimeZones::truncate();

        //Get all of the countries
        $JSON_timezones = TimeZones::getTimeZones();

        foreach ($JSON_timezones as $timezone) {
            TimeZones::create([
                'value' => $timezone->value,
                'abbr' => $timezone->abbr,
                'offset' => $timezone->offset,
                'isdst' => $timezone->isdst,
                'text' => $timezone->text,
            ]);
        }
    }
}
