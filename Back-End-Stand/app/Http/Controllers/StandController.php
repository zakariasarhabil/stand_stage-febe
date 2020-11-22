<?php

namespace App\Http\Controllers;

use App\Stand;
use Illuminate\Http\Request;

class StandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stand = Stand::with('galerie')->get();
        /* $stand = Stand::all(); */
        /* ->where("user_id", "=",auth()->user()->id) */

        return $stand ;
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
        $stand = new Stand();
        $stand->description = $request->description;
        $stand->name =  $request->name;
        $stand->statu_id =  1;
        $stand->theme_id =  $request->theme_id;
        $stand->espace_exposition_id = $request->espace_exposition_id;
        $stand->user_id = $request->user()->id;
        $stand->save();
        return $stand ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stand = Stand::with('reseau','video','lienExtern','galerie','temoignage','Document')->find($id);
        return $stand;
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
        $stand = Stand::findOrFail($id);
        $stand->description = $request->description;
        $stand->name =  $request->name;
        $stand->statu_id =  $request->statu_id;
        $stand->theme_id =  $request->theme_id;
        $stand->espace_exposition_id = $request->espace_exposition_id;
        $stand->save();
        return $stand ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Stand::destroy($id);
        return 'deleted';
    }
}
