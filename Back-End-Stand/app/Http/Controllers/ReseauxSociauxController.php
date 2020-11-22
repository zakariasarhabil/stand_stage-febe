<?php

namespace App\Http\Controllers;

use App\Reseaux_sociaux;
use Illuminate\Http\Request;

class ReseauxSociauxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reseau = Reseaux_sociaux::with('stand')->get();
        return $reseau ;
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
        $reseau = new Reseaux_sociaux();
        $reseau->name = $request->name;
        $reseau-> link = $request->link;
        $reseau->stand_id =  $request->stand_id;

        $reseau->save();
        return $reseau;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reseau = Reseaux_sociaux::with('stand')->find($id);
        return $reseau;
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
        $reseau = Reseaux_sociaux::findOrFail($id);
        $reseau->name = $request->name;
        $reseau-> link = $request->link;
        $reseau->stand_id =  $request->stand_id;

        $reseau->save();

        return $reseau;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reseaux_sociaux::destroy($id);
        return 'delete !!!!';
    }
}
