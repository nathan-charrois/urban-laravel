<?php

namespace App;

use App\Helpers\AddressHelper;
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

	/**
	 * Find the region at the given address.
	 * 
	 * @param  string  $zip
	 * @param  string  $street
	 * @return Builder
	 */
	public static function locatedAt($zip, $street)
	{
        $street = AddressHelper::decodeURL($street);

        return static::where(compact('zip', 'street'))->firstOrFail();
	}

	/**
	 * Format price attribute.
	 * 
	 * @param  string $price
	 * @return string
	 */
    public function getPriceAttribute($price)
    {
        return '$' . number_format($price);
    }

    /**
     * Save photo to a region.
     */
    public function addPhoto(Photo $photo)
    {
    	return $this->photos()->save($photo);
    }
	
	/**
	 * A region has many photos.
	 * 
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
    public function photos()
    {
    	return $this->hasMany('App\Photo');
    }

    /**
     * A region is owned by a user.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Determine if the given user created the region.
     * 
     * @param  User $user
     * @return boolean
     */
    public function ownedBy(User $user)
    {
    	return $this->user_id == $user->id;
    }

    /**
     * Get path to a region.
     * 
     * @return string
     */
    public function path()
    {
        return $this->zip . '/' . AddressHelper::encodeURL($this->street);
    }
}
