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
        $search = $request->get('search');
        if($search){
            // $query = History::query();
            // $query->where('trip_date', 'like', '%'.$search.'%')
            //       ->where('member_name', 'like', '%'.$search.'%')
            //       ->where('location_name', 'like', '%'.$search.'%');
            // $histories = $query->get();
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
        $data = $request->only('trip_date','member_id','start','end');
        $history->creates($data);
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
        $result = $history->deletes($id);
        if($result === 0){
            Log::info("${id}の削除に失敗しました。");
        }
        return redirect('/history');
    }

}
