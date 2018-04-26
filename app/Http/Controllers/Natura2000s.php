<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\natura2000_ddt38;


use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Natura2000s extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

     $natura2000s = natura2000_ddt38::orderBy('nom_natura2000')->paginate(10);

     return view('natura2000s.index')->with('natura2000s', $natura2000s);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('natura2000s.create');
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
        $nom_natura2000=$request->nom_natura2000;
        $departements=$request->departements;
        $annee_maj=$request->annee_maj;
        



        natura2000_ddt38::insert(
                array(
                'nom_natura2000'=>$nom_natura2000,
                'departements'=>$departements,
                'annee_maj'=>$annee_maj

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('natura2000')->with('message', $message);
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
        $natura2000= natura2000_ddt38::find($id);
        return view('natura2000s.edit',compact('natura2000'))->with('natura2000', $natura2000);
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
       DB::table('natura2000_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'nom_natura2000'=>$request->nom_natura2000,
            'departements'=>$request->departements,
            'annee_maj'=>$request->annee_maj

                )
        );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('natura2000')->with('message', $message);
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
            natura2000_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('natura2000')->with('message', $message);

    }



}
