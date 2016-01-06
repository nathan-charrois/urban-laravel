<?php

namespace App\Http\Utilities;

class Country
{
	protected static $countries = [
		'United States'	=> 'United States',
		'Canada' => 'Canada',
		'England' => 'England',
		'Japan' => 'Japan'
	];

	public static function all()
	{
		return static::$countries;
	}
}

