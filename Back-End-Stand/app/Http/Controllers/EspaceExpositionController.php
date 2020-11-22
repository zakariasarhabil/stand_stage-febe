<?php

namespace App\Http\Controllers;

use App\Espace_exposition;
use Illuminate\Http\Request;

class EspaceExpositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $espace = Espace_exposition::with('stand')->get();
        return $espace ;
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
        $espace = new Espace_exposition();
        $espace->name = $request->name;
        $espace->evenement_id =  $request->evenement_id;
        $espace->save();
        return $espace ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $even = Espace_exposition::with('stand')->find($id);
        return $even;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $espace = Espace_exposition::findOrFail($id);
        $espace->name = $request->name;
        $espace->evenement_id =  $request->evenement_id;
        $espace->save();
        return $espace ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Espace_exposition::destroy($id);
        return 'deleted';
    }
}
