<?php

namespace App\Http\Controllers;

use App\Member;
use App\Location;
use App\Headquarters;
use Illuminate\Http\Request;

class HistoryAPIController extends Controller
{
    public function routeAjax(Request $request)
    {
        $member_id = $request->get('member_id');
        $start_value = $request->get('start');
        $location_id = $request->get('end');

        if($start_value === 0){
            $start = Headquarters::find(1);
        }else{
            $start = Member::find($member_id);
        }
        $end = Location::find($location_id);
        
        return compact('start','end');
    }
}
