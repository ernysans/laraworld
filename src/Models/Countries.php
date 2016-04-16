<?php

namespace ErnySans\Countries\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

/**
 * CountryList
 *
 */
class Countries extends Model
{

    /**
     * @var string
     * Path to the directory containing countries data.
     */
    protected $countries;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vendor_countries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'capital',
        'citizenship',
        'country-code',
        'currency',
        'currency_code',
        'currency_sub_unit',
        'full_name',
        'iso_3166_2',
        'iso_3166_3',
        'name',
        'region-code',
        'sub-region-code',
        'eea',
        'calling_code',
        'currency_symbol'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

    /**
     * Protect $dates
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * Get the countries from the JSON file, if it hasn't already been loaded.
     *
     * @return array
     */
    public static function getCountries()
    {

        $path = dirname(dirname(__FILE__)) . '/Data/';

        $data = File::get($path . 'countries.json');
        $timeZones = json_decode($data);

        //Return the Time Zones
        return $timeZones;

    }

    /**
     * Returns one country
     *
     * @param string $id The country id
     *
     * @return array
     */
    public function getOne($id)
    {
        $countries = $this->getCountries();
        return $countries[$id];
    }

    /**
    * Returns a list of countries
    *
    * @param string sort
    *
    * @return array
    */
    public function getList($sort = null)
    {
        //Get the countries list
        $countries = $this->getCountries();

        //Sorting
        $validSorts = array(
            'capital',
            'citizenship',
            'country-code',
            'currency',
            'currency_code',
            'currency_sub_unit',
            'full_name',
            'iso_3166_2',
            'iso_3166_3',
            'name',
            'region-code',
            'sub-region-code',
            'eea',
            'calling_code',
            'currency_symbol',
            'flag'
        );

        if (!is_null($sort) && in_array($sort, $validSorts)) {
            uasort($countries, function ($a, $b) use ($sort) {
                if (!isset($a[$sort]) && !isset($b[$sort])) {
                    return 0;
                } elseif (!isset($a[$sort])) {
                    return -1;
                } elseif (!isset($b[$sort])) {
                    return 1;
                } else {
                    return strcasecmp($a[$sort], $b[$sort]);
                }
            });
        }

        //Return the countries
        return $countries;
    }
}
