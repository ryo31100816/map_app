<?php

namespace App\Http\Controllers;

use App\History;
use Illuminate\Http\Request;

class MemberHistoryController extends Controller
{
    public function getByMemberId(Request $request, $id, History $history){
        $title = 'Member History';
        $history = History::where('member_id',$id)->get();
        return view('history/member_history', compact('title', 'id'), ['histories' => $history]);
    }
}
