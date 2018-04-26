<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\population_comm_ddt38;
use App\comm_ddt38;


use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Populations extends Controller   
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

     $populations = DB::table('population_comm_ddt38')

     ->join('comm_ddt38', function ($join) {
        $join->on('population_comm_ddt38.id_comm', '=', 'comm_ddt38.id');})
     ->select( 'population_comm_ddt38.id','id_comm','annee','population','nom_comm')
     ->orderBy('nom_comm')
     ->orderBy('annee')
     ->paginate(20);

     return view('populations.index')->with('populations', $populations);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {

        $communes=comm_ddt38::orderBy("nom_comm")->pluck('nom_comm','id');
        return View('populations.create')->with('communes', $communes);
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
        $population=$request->population;
        


        population_comm_ddt38::insert(
            array(
                'id'=>$id,
                'id_comm'=>$id_comm,
                'annee'=>$annee,
                'population'=>$population

                

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('population')->with('message', $message);
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
        $population= population_comm_ddt38::find($id);
      
        return view('populations.edit',compact('population'))->with('population', $population);
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
       DB::table('population_comm_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'population'=>$request->population,


            )
           );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('population')->with('message', $message);
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
            population_comm_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('population')->with('message', $message);

    }



}
