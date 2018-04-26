<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\step_ddt38;


use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class steps extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $steps = step_ddt38::orderBy('nom_step')->paginate(15);
    // dd($steps);
     return view('steps.index')->with('steps', $steps);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('steps.create');
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
        $nom_step=$request->nom_step;
        $capacite=$request->capacite;
        $niveau_priorite=$request->niveau_priorite;
        $date_courrier=$request->date_courrier;
        $mise_en_demeure=$request->mise_en_demeure;
        $annee_mis_en_dem=$request->annee_mis_en_dem;
        $annee_maj=$request->annee_maj;


        step_ddt38::insert(
                array(
                'nom_step'=>$nom_step,
                'capacite'=>$capacite,
                'niveau_priorite'=>$niveau_priorite,
                'date_courrier'=>$date_courrier,
                'mise_en_demeure'=>$mise_en_demeure,
                'annee_mis_en_dem'=>$annee_mis_en_dem,
                'annee_maj'=>$annee_maj
                

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('step')->with('message', $message);
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
        $step= step_ddt38::find($id);
        return view('steps.edit',compact('step'))->with('step', $step);
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
       DB::table('step_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'nom_step'=>$request->nom_step,
            'capacite'=>$request->capacite,
            'niveau_priorite'=>$request->niveau_priorite,
            'date_courrier'=>$request->date_courrier,
            'mise_en_demeure'=>$request->mise_en_demeure,
            'annee_mis_en_dem'=>$request->annee_mis_en_dem,
            'annee_maj'=>$request->annee_maj

                )
        );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('step')->with('message', $message);
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
            step_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('step')->with('message', $message);

    }



}
