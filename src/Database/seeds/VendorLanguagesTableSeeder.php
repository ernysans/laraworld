<?php

use Illuminate\Database\Seeder;
use App\Models\Vendor\Languages;
use Illuminate\Support\Facades\DB;

class VendorLanguagesTableSeeder extends Seeder
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
        $JSON_languages = Languages::getLanguages();

        foreach ($JSON_languages as $language) {
            Languages::create([
                'alpha2' => $language->alpha2,
                'english' => $language->english,
                //'native' => $language->native,
            ]);
        }
    }
}
