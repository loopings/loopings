<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\digues_ddt38;


use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Digues extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $digues = digues_ddt38::orderBy('nom_bassinversant')->paginate(10);
    // dd($digues);
     return view('digues.index')->with('digues', $digues);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('digues.create');
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
        $nom_bassinversant=$request->nom_bassinversant;
        $nom_riviere=$request->nom_riviere;
        $rive_protegee=$request->rive_protegee;
        $nom_gestionnaire=$request->nom_gestionnaire;
        $type_gestionnaire=$request->type_gestionnaire;
        $proprietaire=$request->proprietaire;
        $type_proprietaire=$request->type_proprietaire;
        $annee_maj=$request->annee_maj;
      
        



        digues_ddt38::insert(
                array(
                'nom_bassinversant'=>$nom_bassinversant,
                'nom_riviere'=>$nom_riviere,
                'rive_protegee'=>$rive_protegee,
                'nom_gestionnaire'=>$nom_gestionnaire,
                'type_gestionnaire'=>$type_gestionnaire,
                'proprietaire'=>$proprietaire,
                'type_proprietaire'=>$type_proprietaire,
                'annee_maj'=>$annee_maj

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('digue')->with('message', $message);
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
        $digue= digues_ddt38::find($id);
        return view('digues.edit',compact('digue'))->with('digue', $digue);
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
       DB::table('digues_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'nom_bassinversant'=>$request->nom_bassinversant,
            'nom_riviere'=>$request->nom_riviere,
            'rive_protegee'=>$request->rive_protegee,
            'nom_gestionnaire'=>$request->nom_gestionnaire,
            'type_gestionnaire'=>$request->type_gestionnaire,
            'proprietaire'=>$request->proprietaire,
            'type_proprietaire'=>$request->type_proprietaire,
            'annee_maj'=>$request->annee_maj

                )
        );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('digue')->with('message', $message);
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
            digues_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('digue')->with('message', $message);

    }



}
