<?php

namespace App\Http\Controllers;

use App\Headquarters;
use Illuminate\Http\Request;
use App\Http\Requests\HeadquartersRequest;
use Illuminate\Support\Facades\Log;

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
     * @param  \App\Headquarters  $headquarters
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Headquarters $headquarters)
    {
        $title = 'Headquarters show';
        $headquarters = Headquarters::find(1);
        return view('headquarters/show', ['title' => $title], ['headquarters' => $headquarters]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Headquarters  $headquarters
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id, Headquarters $headquarters)
    {
        $title = 'Headquarters edit';
        $headquarters = Headquarters::findOrFail($id);
        return view('headquarters/edit', ['title' => $title], ['headquarters' => $headquarters]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Headquarters  $headquarters
     * @return \Illuminate\Http\Response
     */
    public function update(HeadquartersRequest $request, $id)
    {
        $headquarters = new Headquarters();
        $headquarters = Headquarters::findOrFail($id);
        $data = $request->only('address','latitude','longitude');
        $record = $headquarters->updateByRequest($data);
        Log::debug(print_r($record,true));
        return redirect()->route('headquarters.show',['id' => $record->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Headquarters  $headquarters
     * @return \Illuminate\Http\Response
     */
    public function destroy(Headquarters $headquarters)
    {
        //
    }
}
