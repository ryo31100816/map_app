<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use App\Http\Requests\FormSendRequest;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Location List';
        $search = $request->get('search');
        if($search){
            $query = Location::query();
            $query->where('name', 'like', '%'.$search.'%');
            $locations = $query->get();
        }else{
            $locations = Location::all();
        }
        return view('location/index', ['title' => $title], ['locations' => $locations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $title = 'Location new';
        return view('location/new', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormSendRequest $request)
    {
        $location = new Location();
        $location->name = $request->name;
        $location->address = $request->address;
        $location->latitude = $request->latitude;
        $location->longitude = $request->longitude;
        $location->save();
        return redirect()->route('location.show', ['id' => $location->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id, Location $location)
    {
        $title = 'Location show';
        $location = Location::find($id);
        return view('location/show', ['title' => $title], ['location' => $location]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id, Location $location)
    {
        $title = 'Location edit';
        $location = Location::find($id);
        return view('location/edit', ['title' => $title], ['location' => $location]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(FormSendRequest $request, $id,  Location $location)
    {
        $location = Location::find($id);
        $location->name = $request->name;
        $location->address = $request->address;
        $location->latitude = $request->latitude;
        $location->longitude = $request->longitude;
        $location->save();
        return redirect()->route('location/location.show', ['id' => $location->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        $location = Location::find($id);
        $location->delete();
        return redirect('location/index');
    }
}
