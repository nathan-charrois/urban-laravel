<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Region;
use App\Http\Requests;
use App\Http\Requests\RegionRequest;
use App\Http\Controllers\Controller;
use App\Helpers\FlashHelper;

class RegionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);

        // Delegate up to abstract App\Http\Controllers\Controller.
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'hey';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('regions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RegionRequest  $request
     * @param  FlashHelper    $flash
     * @return Response
     */
    public function store(RegionRequest $request, FlashHelper $flash)
    {
        $region = $this->user->publish(
            new Region($request->all())
        );

        $flash->success('Success');

        return redirect($region->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($zip, $street)
    {
        $region = Region::locatedAt($zip, $street);

        return view('regions.show', compact('region'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
