<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\colgesteaup_ddt38;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Colgesteaups extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $colgesteaups = colgesteaup_ddt38::orderBy('nom_colgesteaup')->paginate(10);
     return view('colgesteaups.index')->with('colgesteaups', $colgesteaups);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('colgesteaups.create');
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
        $nom_colgesteaup=$request->nom_colgesteaup;
        $annee_maj=$request->annee_maj;
       



        colgesteaup_ddt38::insert(
                array(
                'nom_colgesteaup'=>$nom_colgesteaup,
                'annee_maj'=>$annee_maj,
                

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('colgesteaup')->with('message', $message);
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
        $colgesteaup= colgesteaup_ddt38::find($id);
        return view('colgesteaups.edit',compact('colgesteaup'))->with('colgesteaup', $colgesteaup);
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
       DB::table('colgesteaup_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'nom_colgesteaup'=>$request->nom_colgesteaup,
            'annee_maj'=>$request->annee_maj
            

                )
        );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('colgesteaup')->with('message', $message);
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
            colgesteaup_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('colgesteaup')->with('message', $message);

    }



}
