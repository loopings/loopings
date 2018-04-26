<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\maet_ddt38;


use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Maets extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $maets = maet_ddt38::orderBy('nom_maet')->paginate(10);
    // dd($maets);
     return view('maets.index')->with('maets', $maets);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('maets.create');
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
        $nom_maet=$request->nom_maet;
       $annee_maj=$request->annee_maj;
        


        maet_ddt38::insert(
                array(
                'nom_maet'=>$nom_maet,
                'annee_maj'=>$annee_maj
               
                

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('maet')->with('message', $message);
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
        $maet= maet_ddt38::find($id);
        return view('maets.edit',compact('maet'))->with('maet', $maet);
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
       DB::table('maet_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'nom_maet'=>$request->nom_maet, 
            'annee_maj'=>$request->annee_maj
            

                )
        );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('maet')->with('message', $message);
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
            maet_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('maet')->with('message', $message);

    }



}
