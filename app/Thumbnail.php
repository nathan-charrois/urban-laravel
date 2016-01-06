<?php

namespace App;

use Image;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Thumbnail {

	public function make($src, $destination)
	{
        Image::make($src)->fit(200)->save($destination);
	}
}