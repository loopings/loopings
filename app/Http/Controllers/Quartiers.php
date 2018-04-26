<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\quartier_cucsnonzus_ddt38;
use App\comm_ddt38;


use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Quartiers extends Controller   
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

     $quartiers = DB::table('quartier_cucsnonzus_ddt38')
     ->join('comm_ddt38', function ($join) {
        $join->on('quartier_cucsnonzus_ddt38.id_comm', '=', 'comm_ddt38.id');})
     ->select( 'quartier_cucsnonzus_ddt38.id','id_comm','nom_quartier','annee_maj','nom_comm')
     ->orderBy('nom_comm')
     ->paginate(20);

     return view('quartiers.index')->with('quartiers', $quartiers);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {

        $communes=comm_ddt38::orderBy("nom_comm")->pluck('nom_comm','id');
        return View('quartiers.create')->with('communes', $communes);
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
        $nom_quartier=strtoupper($request->nom_quartier);

        


        quartier_cucsnonzus_ddt38::insert(
            array(
                'id_comm'=>$id_comm,
                'nom_quartier'=>$nom_quartier,

                'annee_maj'=>date("Y")
                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('quartier')->with('message', $message);
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
        $quartier= quartier_cucsnonzus_ddt38::find($id);
        return view('quartiers.edit',compact('quartier'))->with('quartier', $quartier);
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
       DB::table('quartier_cucsnonzus_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
                'nom_quartier'=>strtoupper($request->nom_quartier),
                'annee_maj'=>date("Y")
           
            )
           );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('quartier')->with('message', $message);
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
            quartier_cucsnonzus_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('quartier')->with('message', $message);

    }



}
