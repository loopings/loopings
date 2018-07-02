<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\pasto_ddt38;
use App\epci_ddt38;


use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Pastos extends Controller   
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

     $pastos = DB::table('pasto_ddt38')

     ->join('epci_ddt38', function ($join) {
        $join->on('pasto_ddt38.id_epci', '=', 'epci_ddt38.id');})
     ->select( 'pasto_ddt38.id','id_epci','nom_groupement','lien')
     ->orderBy('nom_groupement')
     ->paginate(20);

     return view('pastos.index')->with('pastos', $pastos);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {

        $epcis=epci_ddt38::orderBy("nom_groupement")->pluck('nom_groupement','id');
        return View('pastos.create')->with('epcis', $epcis);
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
  


        $id_epci=$request->id;
        $lien=$request->lien;


        pasto_ddt38::insert(
            array(
                'id_epci'=>$id_epci,  
                'lien'=>$lien

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('pasto')->with('message', $message);
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
        $pasto= pasto_ddt38::find($id);
      
        return view('pastos.edit',compact('pasto'))->with('pasto', $pasto);
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
       DB::table('pasto_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'lien'=>$request->lien
            )
           );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('pasto')->with('message', $message);
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
            pasto_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('pasto')->with('message', $message);

    }



}
