<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\lgmts_commences_ddt38;
use App\comm_ddt38;


use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;

class Logementcs extends Controller   
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

     $logementcs = DB::table('lgmts_commences_ddt38')

     ->join('comm_ddt38', function ($join) {
        $join->on('lgmts_commences_ddt38.id_comm', '=', 'comm_ddt38.id');})
     ->select( 'lgmts_commences_ddt38.id','id_comm','annee','nb_indiv_pur','nb_indiv_gpes','nb_collectifs','nb_residence','nom_comm')
     ->orderBy('nom_comm')
     ->orderBy('annee')
     ->paginate(20);

            
           
           



     return view('logementcs.index')->with('logementcs', $logementcs);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {

        $communes=comm_ddt38::orderBy("nom_comm")->pluck('nom_comm','id');
        return View('logementcs.create')->with('communes', $communes);
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
        $id=strval($request->id).strval($request->annee);
        $id=intval($id);
        


        $id_comm=$request->id;
        $annee=$request->annee;
        $nb_indiv_pur=$request->nb_indiv_pur;
        $nb_collectifs=$request->nb_collectifs;
        $nb_residence=$request->nb_residence;
        $nb_indiv_gpes=$request->nb_indiv_gpes;



        lgmts_commences_ddt38::insert(
            array(
                'id'=>$id,
                'id_comm'=>$id_comm,
                'annee'=>$annee,
                
                'nb_indiv_pur'=>$nb_indiv_pur,
                'nb_collectifs'=>$nb_collectifs,
                'nb_residence'=>$nb_residence,
                'nb_indiv_gpes'=>$nb_indiv_gpes

                

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('logementc')->with('message', $message);
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
        $logementc= lgmts_commences_ddt38::find($id);
      
        return view('logementcs.edit',compact('logementc'))->with('logementc', $logementc);
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
       DB::table('lgmts_commences_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'nb_indiv_pur'=>$request->nb_indiv_pur,
            'nb_collectifs'=>$request->nb_collectifs,
            'nb_residence'=>$request->nb_residence,
            'nb_indiv_gpes'=>$request->nb_indiv_gpes

            )
           );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('logementc')->with('message', $message);
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
            lgmts_commences_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('logementc')->with('message', $message);

    }



}
