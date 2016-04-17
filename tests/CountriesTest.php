<?php
use ErnySans\Laraworld\Models\Countries;
use ErnySans\Laraworld\LaraworldFacade;

class CountriesTest extends \PHPUnit_Framework_TestCase
{
    public function testItFetchesJsonFile()
    {
        $countries = Countries::allJSON();

        return $countries;

    }
}
