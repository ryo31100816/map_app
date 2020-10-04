<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use App\Http\Requests\FormSendRequest;
use Illuminate\Support\Facades\Log;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Member List';
        $search = $request->get('search');
        $user_id = \Auth::user()->id;
        $role = \Auth::user()->role;

        if($search){
            $query = Member::query();
            $query->where('name', 'like', '%'.$search.'%');
            $members = $query->get();
        }else{
            if($role === 0){
                $members = Member::all();
            }elseif($role === 5){   
                $query = Member::query();
                $query->where('user_id', '=', $user_id);
                $members = $query->get();
            }
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
        $data = $request->only('name','address','latitude','longitude');
        $member->creates($data);
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
        $member = Member::findOrFail($id);
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
        $member = Member::findOrFail($id);
        return view('member/edit', ['title' => $title], ['member' => $member]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(FormSendRequest $request, $id)
    {
        $member = new Member();
        $data = $request->only('name','address','latitude','longitude');
        $member_record = $member->updates($data);

        return redirect()->route('member.show', ['id' => $member_record->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $member = new Member();
        $result = $member->deletes($id);
        if($result === 0){
            Log::info("${id}の削除に失敗しました。");
        }
        return redirect('/member');
    }
}
