<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\agriculture_ddt38;
use App\comm_ddt38;


use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Agricultures extends Controller   
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

     $agricultures = DB::table('agriculture_ddt38')

     ->join('comm_ddt38', function ($join) {
        $join->on('agriculture_ddt38.id_comm', '=', 'comm_ddt38.id');})
     ->select( 'agriculture_ddt38.id','id_comm','annee','exploit','unitravail','sau_ha','cheptel','orientecheco','surflabour_ha','surfcultperm_ha','surfherbe_ha','nom_comm')
     ->orderBy('nom_comm')
     ->orderBy('annee')
     ->paginate(20);

     return view('agricultures.index')->with('agricultures', $agricultures);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {

        $communes=comm_ddt38::orderBy("nom_comm")->pluck('nom_comm','id');
        return View('agricultures.create')->with('communes', $communes);
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
        $exploit=$request->exploit;
        $sau_ha=$request->sau_ha;
        $cheptel=$request->cheptel;
        $orientecheco=strtoupper($request->orientecheco);
        $surflabour_ha=$request->surflabour_ha;
        $surfcultperm_ha=$request->surfcultperm_ha;
        $unitravail=$request->unitravail;
        $surfherbe_ha=$request->surfherbe_ha;


        agriculture_ddt38::insert(
            array(
                'id'=>$id,
                'id_comm'=>$id_comm,
                'annee'=>$annee,
                
                'exploit'=>$exploit,
                'sau_ha'=>$sau_ha,
                'cheptel'=>$cheptel,
                'orientecheco'=>$orientecheco,
                'surflabour_ha'=>$surflabour_ha,
                'surfcultperm_ha'=>$surfcultperm_ha,
                'unitravail'=>$unitravail,
                'surfherbe_ha'=>$surfherbe_ha
                

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('agriculture')->with('message', $message);
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
        $agriculture= agriculture_ddt38::find($id);
      
        return view('agricultures.edit',compact('agriculture'))->with('agriculture', $agriculture);
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
       DB::table('agriculture_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'exploit'=>$request->exploit,
            'sau_ha'=>$request->sau_ha,
            'cheptel'=>$request->cheptel,
            'orientecheco'=>strtoupper($request->orientecheco),
            'surflabour_ha'=>$request->surflabour_ha,
            'surfcultperm_ha'=>$request->surfcultperm_ha,
            'unitravail'=>$request->unitravail,
            'surfherbe_ha'=>$request->surfherbe_ha

            )
           );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('agriculture')->with('message', $message);
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
            agriculture_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('agriculture')->with('message', $message);

    }



}
