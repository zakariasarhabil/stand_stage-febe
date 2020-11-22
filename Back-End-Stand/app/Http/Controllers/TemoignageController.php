<?php

namespace App\Http\Controllers;

use App\Temoignage;
use Illuminate\Http\Request;

class TemoignageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temoignage = Temoignage::with('stand')->get();
        return $temoignage ;
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
        $temoignage = new Temoignage();
        $temoignage->name = $request->name;
        $temoignage-> content = $request->content;
        $temoignage->stand_id =  $request->stand_id;

        $temoignage->save();
        return $temoignage ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $galerie = Temoignage::with('stand')->find($id);
        return $galerie;
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
        $temoignage = Temoignage::findOrFail($id);
        $temoignage->name = $request->name;
        $temoignage-> content = $request->content;
        $temoignage->stand_id =  $request->stand_id;

        $temoignage->save();
        return $temoignage ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Temoignage::destroy($id);
        return 'deleted';
    }
}
