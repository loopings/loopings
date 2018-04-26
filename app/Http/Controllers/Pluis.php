<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\plui_ddt38;
use App\epci_ddt38;


use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class pluis extends Controller   
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

     $pluis = DB::table('plui_ddt38')

     ->join('epci_ddt38', function ($join) {
        $join->on('plui_ddt38.id_epci', '=', 'epci_ddt38.id');})
     ->select( 'plui_ddt38.id','id_epci','nom_groupement','type_plui','correspondant_ddt','etat_avancement_plui','perimetre')
     ->orderBy('nom_groupement')
     ->orderBy('correspondant_ddt')
     ->paginate(20);

     return view('pluis.index')->with('pluis', $pluis);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {

        $epcis=epci_ddt38::orderBy("nom_groupement")->pluck('nom_groupement','id');
        return View('pluis.create')->with('epcis', $epcis);
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
        $correspondant_ddt=$request->correspondant_ddt;
        $etat_avancement_plui=$request->etat_avancement_plui;
        $type_plui=$request->type_plui;
        $perimetre=$request->perimetre;


        plui_ddt38::insert(
            array(
                'id_epci'=>$id_epci,  
                'correspondant_ddt'=>$correspondant_ddt,
                'etat_avancement_plui'=>$etat_avancement_plui,
                'type_plui'=>$type_plui,
                'perimetre'=>$perimetre
                

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('plui')->with('message', $message);
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
        $plui= plui_ddt38::find($id);
      
        return view('pluis.edit',compact('plui'))->with('plui', $plui);
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
       DB::table('plui_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'correspondant_ddt'=>$request->correspondant_ddt,
            'etat_avancement_plui'=>$request->etat_avancement_plui,
            'type_plui'=>$request->type_plui,
            'perimetre'=>$request->perimetre
            )
           );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('plui')->with('message', $message);
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
            plui_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('plui')->with('message', $message);

    }



}
