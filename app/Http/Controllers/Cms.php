<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\cm_ddt38;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Cms extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $cms = cm_ddt38::orderBy('nom_contrat')->paginate(10);
     return view('cms.index')->with('cms', $cms);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('cms.create');
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
        $nom_contrat=$request->nom_contrat;
        $annee_maj=$request->annee_maj;
       


        cm_ddt38::insert(
                array(
                'nom_contrat'=>$nom_contrat,
                'annee_maj'=>$annee_maj,
                

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('cm')->with('message', $message);
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
        $cm= cm_ddt38::find($id);
        return view('cms.edit',compact('cm'))->with('cm', $cm);
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
       DB::table('cm_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'nom_contrat'=>$request->nom_contrat,
            'annee_maj'=>$request->annee_maj
            

                )
        );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('cm')->with('message', $message);
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
            cm_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('cm')->with('message', $message);

    }



}
