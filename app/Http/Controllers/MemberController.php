<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use App\Http\Requests\FormSendRequest;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Member index';
        $search = $request->get('search');
        if($search){
            $query = Member::query();
            $query->where('name', 'like', '%'.$search.'%');
            $members = $query->get();
        }else{
            $members = Member::all();
        }
        return view('member/index', ['title' => $title], ['members' => $members]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Member new';
        return view('member/new', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormSendRequest $request)
    {
        $member = new Member();
        $member->name = $request->name;
        $member->address = $request->address;
        $member->latitude = $request->latitude;
        $member->longitude = $request->longitude;
        $member->save();
        return redirect()->route('member.show', ['id' => $member->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id, Member $member)
    {
        $title = 'Member show';
        $member = Member::find($id);
        return view('member/show', ['title' => $title], ['member' => $member]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id, Member $member)
    {
        $title = 'Member edit';
        $member = Member::find($id);
        return view('member/edit', ['title' => $title], ['member' => $member]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(FormSendRequest $request, $id, Member $member)
    {
        $member = Member::find($id);
        $member->name = $request->name;
        $member->address = $request->address;
        $member->latitude = $request->latitude;
        $member->longitude = $request->longitude;
        $member->save();
        return redirect()->route('member.show', ['id' => $member->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id, Member $member)
    {
        $member = Member::find($id);
        $member->delete();
        return redirect('/members');
    }
}
