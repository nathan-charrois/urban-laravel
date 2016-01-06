<?php

namespace App\Forms;

use App\Region;
use App\Photo;
use App\Thumbnail;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AddPhotoToRegion {

	/**
	 * The Region instance.
	 * 
	 * @var Region
	 */
	protected $region;

	/**
	 * The UploadedFile instance.
	 * @var UploadedFile
	 */
	protected $file;

	/**
	 * Create a new AddPhotoToRegion form object.
	 * @param Region         $region
	 * @param UploadedFile   $file
	 * @param Thumbnail|null $thumbnail
	 */
	public function __construct(Region $region, UploadedFile $file, Thumbnail $thumbnail = null)
	{
		$this->region = $region;
		$this->file = $file;
		$this->thumbnail = $thumbnail ?: new Thumbnail;
	}

	/**
	 * Process the form.
	 * 
	 * @return void
	 */
	public function save()
	{
		$photo = $this->region->addPhoto($this->makePhoto());

		$this->file->move($photo->baseDir(), $photo->name);

		$this->thumbnail->make($photo->path, $photo->thumbnail_path);
	}

	/**
	 * Make a new photo instance.
	 * 
	 * @return Photo
	 */
	protected function makePhoto()
	{
		return new Photo([
			'name' => $this->makeFileName()
		]);
	}

	/**
	 * Make a file name based on the uploaded file.
	 * 
	 * @return string
	 */
	protected function makeFileName()
	{
        $name = sha1(
            date('d-m-Y-g-i') . $this->file->getClientOriginalName()
        );

        $extention = $this->file->getClientOriginalExtension();

        return "{$name}.{$extention}";
	}
}