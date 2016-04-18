<?php

namespace ErnySans\Laraworld\Models;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{

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
     * he attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'full_name',
        'capital',
        'citizenship',
        'currency',
        'currency_code',
        'currency_sub_unit',
        'currency_symbol',
        'country_code',
        'region_code',
        'sub_region_code',
        'eea',
        'calling_code',
        'iso_3166_2',
        'iso_3166_3',
    ];

    /**
     * Get all the countries from the JSON file.
     *
     * @return array
     */
    public static function allJSON()
    {
        $route = dirname(dirname(__FILE__)) . '/Database/data/countries.json';

        return json_decode(file_get_contents($route), true);
    }

}