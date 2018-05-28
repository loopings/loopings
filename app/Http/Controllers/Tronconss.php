<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\troncons_ddt38;
use App\comm_ddt38;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Tronconss extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    
    // dd($tronconss);

          $tronconss = DB::table('troncons_ddt38')

     ->join('comm_ddt38', function ($join) {
        $join->on('troncons_ddt38.id_comm', '=', 'comm_ddt38.id');})
     ->select( 'troncons_ddt38.id','nom_comm','type','categorie_nuisonore','longueur_m','annee_maj')
     ->orderBy('nom_comm')
     ->orderBy('type')
     ->orderBy('categorie_nuisonore')
     ->paginate(20);

      return view('tronconss.index')->with('tronconss', $tronconss);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $comms=comm_ddt38::orderBy("nom_comm")->pluck('nom_comm','id');
        return View('tronconss.create')->with('comms', $comms);
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
   
        $longueur_m=$request->longueur_m;
        $type=$request->type;
        $categorie_nuisonore=$request->categorie_nuisonore;
        $id_comm=$request->id_comm;
         $annee_maj=$request->annee_maj;


        troncons_ddt38::insert(
                array(
                
                'longueur_m'=>$longueur_m,
                'type'=>$type,
                'categorie_nuisonore'=>$categorie_nuisonore,
                'id_comm'=>$id_comm,
                'annee_maj'=>$annee_maj
                

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('troncons')->with('message', $message);
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
        $troncons= troncons_ddt38::find($id);
        return view('tronconss.edit',compact('troncons'))->with('troncons', $troncons);
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
       DB::table('troncons_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
           
            'longueur_m'=>$request->longueur_m,
            'type'=>$request->type,
            'categorie_nuisonore'=>$request->categorie_nuisonore,
            'annee_maj'=>$request->annee_maj

                )
        );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('troncons')->with('message', $message);
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
            troncons_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('troncons')->with('message', $message);

    }



}
