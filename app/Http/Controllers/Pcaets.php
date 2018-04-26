<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\pcaet_ddt38;
use App\epci_ddt38;


use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class pcaets extends Controller   
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

     $pcaets = DB::table('pcaet_ddt38')

     ->join('epci_ddt38', function ($join) {
        $join->on('pcaet_ddt38.id_epci', '=', 'epci_ddt38.id');})
     ->select( 'id_epci','nom_groupement','type_pcaet','correspondant_ddt','etat_avancement_demarche','nom_groupement')
     ->orderBy('nom_groupement')
     ->orderBy('correspondant_ddt')
     ->paginate(20);

     return view('pcaets.index')->with('pcaets', $pcaets);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {

        $epcis=epci_ddt38::orderBy("nom_groupement")->pluck('nom_groupement','id');
        return View('pcaets.create')->with('epcis', $epcis);
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
        $etat_avancement_demarche=$request->etat_avancement_demarche;
        $type_pcaet=$request->type_pcaet;



        pcaet_ddt38::insert(
            array(
                'id_epci'=>$id_epci,  
                'correspondant_ddt'=>$correspondant_ddt,
                'etat_avancement_demarche'=>$etat_avancement_demarche,
                'type_pcaet'=>$type_pcaet

                

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('pcaet')->with('message', $message);
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
        $pcaet= pcaet_ddt38::find($id);
      
        return view('pcaets.edit',compact('pcaet'))->with('pcaet', $pcaet);
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
       DB::table('pcaet_ddt38')
       ->where('id_epci',$id)
       ->update  ( 
           array(
            'correspondant_ddt'=>$request->correspondant_ddt,
            'etat_avancement_demarche'=>$request->etat_avancement_demarche,
            'type_pcaet'=>$request->type_pcaet

            )
           );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('pcaet')->with('message', $message);
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
            pcaet_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('pcaet')->with('message', $message);

    }



}
