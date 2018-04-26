<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\colcompeaup_ddt38;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Colcompeaups extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $colcompeaups = colcompeaup_ddt38::orderBy('nom_colcompeaup')->paginate(10);
     return view('colcompeaups.index')->with('colcompeaups', $colcompeaups);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('colcompeaups.create');
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
        $nom_colcompeaup=$request->nom_colcompeaup;
        $annee_maj=$request->annee_maj;
       



        colcompeaup_ddt38::insert(
                array(
                'nom_colcompeaup'=>$nom_colcompeaup,
                'annee_maj'=>$annee_maj
                

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('colcompeaup')->with('message', $message);
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
        $colcompeaup= colcompeaup_ddt38::find($id);
        return view('colcompeaups.edit',compact('colcompeaup'))->with('colcompeaup', $colcompeaup);
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
       DB::table('colcompeaup_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'nom_colcompeaup'=>$request->nom_colcompeaup,
            'annee_maj'=>$request->annee_maj
            

                )
        );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('colcompeaup')->with('message', $message);
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
            colcompeaup_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('colcompeaup')->with('message', $message);

    }



}
