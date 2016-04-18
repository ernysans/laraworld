<?php

use ErnySans\Laraworld\Models\Languages;
use Illuminate\Support\Facades\Schema;

class LanguagesTest extends AppTestCase
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
        $languages = Languages::all();
        $this->assertNotNull($languages->count());
    }
}
