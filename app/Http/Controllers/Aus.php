<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\au_ddt38;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Aus extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $aus = au_ddt38::orderBy('typologie')->paginate(10);
     return view('aus.index')->with('aus', $aus);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('aus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $message=null;
      try{
        $typologie=$request->typologie;
        $annee_maj=$request->annee_maj;
        $libelle_ville_centre=$request->libelle_ville_centre;
       

        au_ddt38::insert(
                array(
                'typologie'=>$typologie,
                'annee_maj'=>$annee_maj,
                'libelle_ville_centre'=>$libelle_ville_centre
                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('au')->with('message', $message);
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $au= au_ddt38::find($id);
        return view('aus.edit',compact('au'))->with('au', $au);
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



     $message=null;
     try{
       DB::table('au_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'typologie'=>$request->typologie,
            'annee_maj'=>$request->annee_maj,
            'libelle_ville_centre'=>$request->libelle_ville_centre
                )
           );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('au')->with('message', $message);
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message=null;
        try{
            au_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('au')->with('message', $message);

    }



}
