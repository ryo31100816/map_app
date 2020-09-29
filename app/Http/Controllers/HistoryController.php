<?php

namespace App\Http\Controllers;

use App\History;
use App\Member;
use App\Location;
use App\Headquarters;
use Illuminate\Http\Request;
use App\Http\Requests\HistoryRequest;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'History List';
        $histories = History::all();
        return view('history/index', ['title' => $title], ['histories' => $histories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        $title = 'History new';
        $member = Member::find($id);
        $locations = Location::all();
        $headquarters = Headquarters::find(1);
        return view('history/new', compact('title', 'member','locations','headquarters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HistoryRequest $request)
    {
        $history = new History();
        $history->trip_date = $request->trip_date;
        $history->member_id = $request->member_id;
        $history->start = $request->start;
        $history->location_id = $request->end;
        $history->save();
        return redirect()->route('history.show', ['id' => $history->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id, History $history)
    {
        $title = 'History show';
        $history = History::find($id);
        return view('history/show', ['title' => $title], ['history' => $history]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function edit(History $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, History $history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function destroy(History $history)
    {
        $history = History::find($id);
        $history->delete();
        return redirect('history/index');
    }

    public function locationAjax(Request $request)
    {
        $word = $request->get('word');
        $query = Location::query();
        $query->where('name', 'like', '%'.$word.'%');
        $locations = $query->get();

        return json_encode($locations);
    }

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
