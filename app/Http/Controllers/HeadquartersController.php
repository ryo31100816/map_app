<?php

namespace App\Http\Controllers;

use App\headquarters;
use Illuminate\Http\Request;

class HeadquartersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\headquarters  $headquarters
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id, headquarters $headquarters)
    {
        $headquarters = Headquarters::find($id);
        return view('headquarters/headquarters_show', ['headquarters' => $headquarters]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\headquarters  $headquarters
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id, headquarters $headquarters)
    {
        $headquarters = Headquarters::find($id);
        return view('headquarters/headquarters_edit', ['headquarters' => $headquarters]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\headquarters  $headquarters
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, headquarters $headquarters)
    {
        $headquarters = Headquarters::find($id);
        $headquarters->address = $request->address;
        $headquarters->save();
        return redirect()->route('headquarters/headquarters.show',['id' => $headquarters->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\headquarters  $headquarters
     * @return \Illuminate\Http\Response
     */
    public function destroy(headquarters $headquarters)
    {
        //
    }
}
