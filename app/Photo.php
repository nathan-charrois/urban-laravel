<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'regions-photos';

    protected $fillable = ['photo'];

    public function region()
    {
    	return $this->belongsTo('App\Region');
    }
}
