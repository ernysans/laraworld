<?php

namespace ErnySans\Countries\Models;

use Illuminate\Database\Eloquent\Model;

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
     * Get all the countries from the JSON file.
     *
     * @return array
     */
    public static function allJSON()
    {

        $data = json_decode(file_get_contents(__DIR__ . '/Data/countries.json'), true);

        // Return the Countries
        return $data;

    }
}
