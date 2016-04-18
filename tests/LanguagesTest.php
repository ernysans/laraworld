<?php

use ErnySans\Laraworld\Database\seeds\LanguagesTableSeeder;
use ErnySans\Laraworld\Models\Languages;
use Illuminate\Support\Facades\Schema;

class LanguagesTest extends TestCase
{
    /**
     * Check if JSON file exist
     */
    public function testItFetchesJsonFile()
    {
        $languages = Languages::allJSON();
        $this->assertNotNull($languages);
    }

    /**
     * Check if the table exist
     */
    public function testItCheckForTable()
    {
        $languages = Schema::hasTable('languages');
        $this->assertTrue($languages);
    }

    /**
     * Check if the table was seeded
     */
    public function testItCanSeed()
    {
        $seed = new LanguagesTableSeeder();
        $seed->run();

        $languages = Languages::all();
        $this->assertNotNull($languages->count());
    }
}
