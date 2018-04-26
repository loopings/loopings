<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\uu_ddt38;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Uus extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $uus = uu_ddt38::orderBy('libelle_uu')->paginate(10);
     return view('uus.index')->with('uus', $uus);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('uus.create');
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
        $libelle_uu=$request->libelle_uu;
        $population=$request->population;
        $annee_maj=$request->annee_maj;
        $code_geographique=$request->code_geographique;



        uu_ddt38::insert(
                array(
                'libelle_uu'=>$libelle_uu,
                'population'=>$population,
                'annee_maj'=>$annee_maj,
                'code_geographique'=>$code_geographique
                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('uu')->with('message', $message);
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
        $uu= uu_ddt38::find($id);
        return view('uus.edit',compact('uu'))->with('uu', $uu);
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
       DB::table('uu_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'libelle_uu'=>$request->libelle_uu,
            'population'=>$request->population,
            'annee_maj'=>$request->annee_maj,
            'code_geographique'=>$request->code_geographique
                )
        );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('uu')->with('message', $message);
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
            uu_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('uu')->with('message', $message);

    }



}
