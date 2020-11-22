<?php

namespace App\Http\Controllers;

use App\Galerie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galerie = Galerie::with('stand')->get();
        return $galerie ;
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
       /*  $filename = uniqid('img_').'_'.time().'.'.request()->data_img->getClientOriginalExtension(); */
        
       /*  $galerie = new Galerie();
        $galerie->name = $request->name;
        $galerie->link = $request->link;
        $galerie-> keyword = $request->keyword;
        $galerie->stand_id =  $request->stand_id; */

        /* $dd = $request->file('data_img'); */
       /*  request()->file->move(public_path('images'), 'hhhhh.jpg'); */

        /* $galerie->save(); */
        
       /*  return response()->json(); */
        /* return $galerie; */
        /* $file = $request->file('file'); */
        $photo = $request->file('img');
        $extantion = $photo->getClientOriginalExtension();
        $extantion = strtolower($extantion);
        if($extantion == 'jpg' || $extantion == 'png' || $extantion == 'jpeg'){
        $filename = uniqid('img_').'_'.time().'.'.$extantion;
        $galerie = new Galerie();
        $galerie->name = $request->name;
        $galerie-> link = $filename;
        $galerie-> keyword = $request->keyword;
        $galerie->stand_id =  $request->stand_id;
        
        
        
        $photo->move(public_path('images'), $filename); 
        $galerie->save();
        }
        /* return $galerie; */
        return response()->json(['message' => $photo->getClientOriginalExtension()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $galerie = Galerie::with('stand')->find($id);
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
         /* $galerie = Galerie::findOrFail($id);
        $galerie->name = $request->name;
        $galerie-> link = $request->link;
        $galerie-> keyword = $request->keyword;
        $galerie->stand_id =  $request->stand_id;

       $galerie->save(); */


        /* return $galerie; */

        
        return response()->json($request->img);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {    
        $galerie = Galerie::findOrFail($id);
        $filePath = "/images/".$galerie->link; 
        if(file_exists(public_path($filePath))) {
            unlink(public_path($filePath));
        }
         Galerie::destroy($id);
        return 'deleted';
    }

    /**
     * Store a newly created resource in storage.
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function img(Request $request,$id){
        $rep = 'not update';
        $filename = ''; 
        $galerie = Galerie::findOrFail($id);
        if($request->link === $galerie->link){
            $rep = 'update without image';
            }else{
                $rep = 'update with image';
                $filePath = "/images/".$galerie->link; 
                    

                    $photo = $request->file('img');
                    $extantion = $photo->getClientOriginalExtension();
                    $extantion = strtolower($extantion);
                    if($extantion == 'jpg' || $extantion == 'png' || $extantion == 'jpeg'){
                        if(file_exists(public_path($filePath))) {
                            unlink(public_path($filePath));
                        }
                        $filename = uniqid('img_').'_'.time().'.'.$extantion;
                        $photo->move(public_path('images'),$filename);
                        $galerie->link = $filename;
                }

            }
            $galerie->name = $request->name;
            $galerie-> keyword = $request->keyword;
            $galerie->stand_id =  $request->stand_id;
    
            $galerie->save();
        
         /*  $filePath = "/images/hhhhhh.jpg"; 
        if(file_exists(public_path($filePath))){
        unlink(public_path($filePath));
        } */

        /* $photo = $request->file('img');
        $photo->move(public_path('images'),'ffffffffffcxcffffff.jpg'); */
        return response()->json(['message' => true,'statue' => $rep,'newlink'=>$filename]);/* 
        return response()->json('rrrrr'); */
    }
}
