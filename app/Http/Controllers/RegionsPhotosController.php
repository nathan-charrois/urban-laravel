<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Photo;
use App\Region;
use App\Forms\AddPhotoToRegion;
use App\Http\Requests;
use App\Http\Requests\RegionPhotoRequest;
use App\Http\Controllers\Controller;

class RegionsPhotosController extends Controller
{
    /**
     * Add a photo to the referenced region.
     * 
     * @param string  $zip  
     * @param string  $street
     * @param Request $request
     */
    public function store($zip, $street, RegionPhotoRequest $request)
    {
    	$region = Region::locatedAt($zip, $street);
        $photo = $request->file('photo');

        (new AddPhotoToRegion($region, $photo))->save();
    }

    public function destroy($id)
    {
        $photo = Photo::findOrFail($id)->delete();

        return back();
    }
}
