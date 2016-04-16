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
     * Get all the countries from the JSON file.
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
}
