<?php
namespace App\Forms;

use App\AddPhotoToRegion;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Mockery as m;

class AddPhotoToRegionTest extends PHPUnit_Framework_TestCase {

	/** @test */
	function process_form_to_add_photo_to_a_region()
	{
		$region = factory(App\Region::class)->create();
		$file = m::mock(UploadedFile::class, [
			'getClientOriginalName' => 'foo',
			'getClientOriginalExtension' => 'jpg'
		]);

		$file->shouldReceive('move')->once()->with('uploads/regions/photos', 'nowfoo.jpg');

		$thumbnail = m::mock(App\Thumbnail::class);
		$thumbnail->shouldReceive('make')-once()->with('uploads/regions/photos', 'tn-nowfoo.jpg');

		(new AddPhotoToRegion($region, $file, $thumbnail))->save();

		$this->assertCount(1, $region->photos);
	}
}

function time() {
	return 'now';
}