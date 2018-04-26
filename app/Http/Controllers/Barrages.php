<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\barrages_ddt38;
use App\comm_ddt38;


use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Barrages extends Controller   
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

     $barrages = DB::table('barrages_ddt38')
     ->join('comm_ddt38', function ($join) {
        $join->on('barrages_ddt38.id_comm', '=', 'comm_ddt38.id');})
     ->select( 'barrages_ddt38.id','id_comm','nom_barrage','type_barrage','nom_gestionnaire','type_gestionnaire','barrages_ddt38.annee_maj','nom_comm')
     ->orderBy('nom_comm')
     ->paginate(20);

     return view('barrages.index')->with('barrages', $barrages);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {

        $communes=comm_ddt38::orderBy("nom_comm")->pluck('nom_comm','id');
        return View('barrages.create')->with('communes', $communes);
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
        $id_comm=$request->id;
        $nom_barrage=$request->nom_barrage;
        $type_barrage=$request->type_barrage;
        $nom_gestionnaire=$request->nom_barrage;
        $type_gestionnaire=$request->type_barrage;
        $type_gestionnaire=$request->type_barrage;
        $annee_maj=$request->annee_maj;

        barrages_ddt38::insert(
            array(
                'id_comm'=>$id_comm,
                'nom_barrage'=>$nom_barrage,
                'type_barrage'=>$type_barrage,
                'nom_gestionnaire'=>$nom_gestionnaire,
                'type_gestionnaire'=>$type_gestionnaire,
                'annee_maj'=>$annee_maj
                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('barrage')->with('message', $message);
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
        $barrage= barrages_ddt38::find($id);
        return view('barrages.edit',compact('barrage'))->with('barrage', $barrage);
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
       DB::table('barrages_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
                'nom_barrage'=>$request->nom_barrage,
                'type_barrage'=>$request->type_barrage,
                'nom_gestionnaire'=>$request->nom_gestionnaire,
                'type_gestionnaire'=>$request->type_gestionnaire,
                'annee_maj'=>$request->annee_maj
           
            )
           );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('barrage')->with('message', $message);
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
            barrages_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('barrage')->with('message', $message);

    }



}
