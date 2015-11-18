<?php

namespace App\Http\Utilities;

class Country
{
	protected static $countries = [
		'United States'	=> 'us',
		'Canada' => 'ca',
		'England' => 'gb'
	];

	public static function all()
	{
		return static::$countries;
	}
}

