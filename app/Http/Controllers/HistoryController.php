<?php

namespace App\Http\Controllers;

use App\History;
use App\Member;
use App\Location;
use App\Headquarters;
use Illuminate\Http\Request;
use App\Http\Requests\HistoryRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'History List';
        $search = array(
            'trip_date' => $request->get('trip_date'),
            'member_name' => $request->get('member_name'),
            'location_name' => $request->get('location_name')
        );
        if(array_filter($search)){
            $trip_date = $search['trip_date'];
            $histories = History::when($trip_date, function($query, $trip_date){
                return $query->where('trip_date', $trip_date);
            })
            ->whereHas('location',function($q) use ($search) {$q->where('name', 'like', '%'.$search['location_name'].'%');})
            ->whereHas('member',function($q) use ($search) {$q->where('name', 'like', '%'.$search['member_name'].'%');})
            ->get();
        }else{
            $histories = History::all();
        }
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
        $member = Member::findOrFail($id);
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
        $data = $request->only('trip_date','member_id','start','location_id','distance');
        $history->createByRequest($data);
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
        $history = History::findOrFail($id);
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
    public function destroy(Request $request, $id)
    {
        $history = new History();
        $result = $history->deleteByRequest($id);
        if($result === 0){
            Log::info("${id}の削除に失敗しました。");
        }
        return redirect('/history');
    }

}
