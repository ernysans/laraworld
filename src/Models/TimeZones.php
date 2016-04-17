<?php

namespace ErnySans\Laraworld\Models;

use Illuminate\Database\Eloquent\Model;

class TimeZones extends Model
{
    
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'time_zones';

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
		$route = dirname(dirname(__FILE__)) . '/Database/data/timezones.json';

		return json_decode(file_get_contents($route), true);
	}

}
