<?php

use ErnySans\Laraworld\Models\Languages;

class LanguagesTest extends TestCaseApp
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
