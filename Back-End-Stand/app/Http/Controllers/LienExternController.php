<?php

namespace App\Http\Controllers;

use App\Lien_extern;
use Illuminate\Http\Request;

class LienExternController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lienExtern = Lien_extern::with('stand')->get();
        return $lienExtern ;
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
        $lienExtern = new Lien_extern();
        $lienExtern->name = $request->name;
        $lienExtern-> link = $request->link;
        $lienExtern->stand_id =  $request->stand_id;

        $lienExtern->save();


        return $lienExtern;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lienExtern = Lien_extern::with('stand')->find($id);
        return $lienExtern;
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
        $lienExtern = Lien_extern::findOrFail($id);
        $lienExtern->name = $request->name;
        $lienExtern-> link = $request->link;
        $lienExtern->stand_id =  $request->stand_id;

        $lienExtern->save();

        return $lienExtern;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lien_extern::destroy($id);
        return 'deleted';
    }
}
