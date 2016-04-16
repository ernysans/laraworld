<?php

use Illuminate\Database\Seeder;
use ErnySans\Countries\Models\Countries;

class CountriesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return  void
     */
    public function run()
    {
        // Empty the table
        Countries::truncate();

        //Get all of the countries from the JSON file
        $JSON_countries = Countries::getCountries();


        foreach ($JSON_countries as $country) {
            Countries::create([
                'capital' => ((isset($country->capital)) ? $country->capital : null),
                'citizenship' => ((isset($country->citizenship)) ? $country->citizenship : null),
                'country_code' => $country->country_code,
                'currency' => ((isset($country->currency)) ? $country->currency : null),
                'currency_code' => ((isset($country->currency_code)) ? $country->currency_code : null),
                'currency_sub_unit' => ((isset($country->currency_sub_unit)) ? $country->currency_sub_unit : null),
                'full_name' => ((isset($country->full_name)) ? $country->full_name : null),
                'iso_3166_2' => $country->iso_3166_2,
                'iso_3166_3' => $country->iso_3166_3,
                'name' => $country->name,
                'region_code' => $country->region_code,
                'sub_region_code' => $country->sub_region_code,
                'eea' => (bool)$country->eea,
                'calling_code' => $country->calling_code,
                'currency_symbol' => ((isset($country->currency_symbol)) ? $country->currency_symbol : null),
            ]);
        }
    }
}
