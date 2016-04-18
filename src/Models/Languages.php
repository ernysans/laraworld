<?php

namespace ErnySans\Laraworld\Models;

use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
    
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'languages';

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
		'alpha3',
		'alpha2',
		'english',
	];

	/**
	 * Get all the countries from the JSON file.
	 *
	 * @return array
	 */
	public static function allJSON()
	{
		$route = dirname(dirname(__FILE__)) . '/Database/data/languages.json';

		return json_decode(file_get_contents($route), true);
	}

}
