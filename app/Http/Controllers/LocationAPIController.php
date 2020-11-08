<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationAPIController extends Controller
{
    public function locationAjax(Request $request)
    {
        $word = $request->get('word');
        if(isset($word)){
            $query = Location::query();
            $query->where('name', 'like', '%'.$word.'%');
            $locations = $query->get();
        }else{
            $locations = Location::all();
        }
        return json_encode($locations);
    }
}
