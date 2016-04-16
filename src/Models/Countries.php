<?php

namespace ErnySans\Countries\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Countries extends Model
{

    /**
     * @var
     */
    protected $countries;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'countries';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
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
     * Get the countries from the JSON file.
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
     * Returns one country from the JSON file.
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
     * Returns a list of countries from the JSON file.
     *
     * @param null $sort
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
