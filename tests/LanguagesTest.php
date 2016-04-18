<?php

use ErnySans\Laraworld\Models\Languages;

class LanguagesTest extends PHPUnit_Framework_TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testItFetchesJsonFile()
    {
        $languages = Languages::allJSON();
        $this->assertNotNull($languages);
    }
}
