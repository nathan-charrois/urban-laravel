<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{

	protected $fillable = [
		'street',
		'city',
		'state',
		'country',
		'zip',
		'price',
		'description'
	];
	
    public function photos()
    {
    	return $this->hasMany('App\Photo');
    }
}
