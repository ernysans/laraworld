<?php

namespace ErnySans\Laraworld\Database\seeds;

use Illuminate\Database\Seeder;
use ErnySans\Laraworld\Models\Languages;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return  void
     */
    public function run()
    {
        // Empty the table
        Languages::truncate();

        //Get all of the countries
        $JSON_languages = Languages::allJSON();

        foreach ($JSON_languages as $language) {
            Languages::create([
                'alpha3' => $language->alpha2,
                'alpha2' => $language->alpha3,
                'english' => $language->english
            ]);
        }
    }
}
