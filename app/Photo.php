<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
    /**
     * The associated table.
     * 
     * @var string
     */
    protected $table = 'regions_photos';

    /**
     * Fillable fields for a Photo.
     * 
     * @var array
     */
    protected $fillable = ['path', 'name', 'thumbnail_path'];

    /**
     * A photo belongs to region.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function region()
    {
    	return $this->belongsTo('App\Region');
    }

    /**
     * Get the base directory where photos are stored.
     * 
     * @var string
     */
    public function baseDir() {
        return 'uploads/regions/photos';
    }

    /**
     * Method called when name attribute is changed.
     * 
     * @param  string $name
     * @return void
     */
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;

        $this->path = $this->baseDir() .'/'. $name;
        $this->thumbnail_path = $this->baseDir() .'/tn-'. $name;
    }

    /**
     * Delete files and delete entry.
     *
     * @return  void
     */
    public function delete()
    {
        \File::delete([
            $this->path,
            $this->thumbnail_path
        ]);

        parent::delete();
    }
}
