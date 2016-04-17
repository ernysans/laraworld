<?php

namespace ErnySans\Laraworld\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Countries extends Model
{

    protected static $countries;
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
        $path = dirname(dirname(__FILE__)) . '/../Database/data/';
        $data = File::get($path . 'countries.json');
        $response = json_decode($data);

        return $response;
    }

}