<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationAPIController extends Controller
{
    public function locationAjax(Request $request)
    {
        $word = $request->get('word');
        $query = Location::query();
        $query->where('name', 'like', '%'.$word.'%');
        $locations = $query->get();

        return json_encode($locations);
    }
}
