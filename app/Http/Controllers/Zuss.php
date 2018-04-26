<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\zus_ddt38;
use App\comm_ddt38;


use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Zuss extends Controller   
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

     $zuss = DB::table('zus_ddt38')
     ->join('comm_ddt38', function ($join) {
        $join->on('zus_ddt38.id_comm', '=', 'comm_ddt38.id');})
     ->select( 'zus_ddt38.id','id_comm','nom_zus','annee_maj','nom_comm')
     ->orderBy('nom_comm')
     ->paginate(20);

     return view('zuss.index')->with('zuss', $zuss);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {

        $communes=comm_ddt38::orderBy("nom_comm")->pluck('nom_comm','id');
        return View('zuss.create')->with('communes', $communes);
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
        $nom_zus=strtoupper($request->nom_zus);

        


        zus_ddt38::insert(
            array(
                'id_comm'=>$id_comm,
                'nom_zus'=>$nom_zus,

                'annee_maj'=>date("Y")
                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('zus')->with('message', $message);
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
        $zus= zus_ddt38::find($id);
        return view('zuss.edit',compact('zus'))->with('zus', $zus);
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
       DB::table('zus_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
                'nom_zus'=>strtoupper($request->nom_zus),
                'annee_maj'=>date("Y")
           
            )
           );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('zus')->with('message', $message);
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
            zus_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('zus')->with('message', $message);

    }



}
