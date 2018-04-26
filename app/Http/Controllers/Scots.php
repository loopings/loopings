<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\scot_ddt38;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Scots extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $scots = scot_ddt38::orderBy('nom_scot')->paginate(10);
       return view('scots.index')->with('scots', $scots);
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('scots.create');
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
        $nom_scot=$request->nom_scot;
        $rapport_presentation=$request->rapport_presentation;
        $padd=$request->padd;
        $doo=$request->doo;

        scot_ddt38::insert(array('nom_scot'=>$nom_scot,'rapport_presentation'=>$rapport_presentation,'padd'=>$padd,'doo'=>$doo));
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('scot')->with('message', $message);
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
        $scot= scot_ddt38::find($id);
        return view('scots.edit',compact('scot'))->with('scot', $scot);
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
         DB::table('scot_ddt38')
         ->where('id',$id)
         ->update  
         (  
                array
                (
                'nom_scot'=>$request->nom_scot,
                'rapport_presentation'=>$request->rapport_presentation,
                'padd'=>$request->padd,'doo'=>$request->doo
                )
        );

     }catch(QueryException $ex){

        $message=$ex->getMessage();
    }

    return redirect('scot')->with('message', $message);
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
            scot_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('scot')->with('message', $message);

    }



}
