<?php
namespace App;

use App\Forms\AddPhotoToRegion;
use App\Events\UserWasCreated;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Mockery as m;

class AddPhotoToRegionTest extends \TestCase {

	/** @test */
	function process_form_to_add_photo_to_a_region()
	{
		$region = factory(Region::class)->create();
		$file = m::mock(UploadedFile::class, [
			'getClientOriginalName' => 'foo',
			'getClientOriginalExtension' => 'jpg'
		]);
		$thumbnail = m::mock(Thumbnail::class);

		$file->shouldReceive('move')->once();
		$thumbnail->shouldReceive('make')->once();

		(new AddPhotoToRegion($region, $file, $thumbnail))->save();

		$this->assertCount(1, $region->photos);
	}
}