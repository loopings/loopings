<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\znieff_ddt38;


use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Znieffs extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $znieffs = znieff_ddt38::orderBy('nom_znieff')->paginate(15);
    // dd($znieffs);
     return view('znieffs.index')->with('znieffs', $znieffs);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('znieffs.create');
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
        $nom_znieff=$request->nom_znieff;
        $type_znieff=$request->type_znieff;
         $annee_maj=$request->annee_maj;


        znieff_ddt38::insert(
                array(
                'nom_znieff'=>$nom_znieff,
                'type_znieff'=>$type_znieff,
                'annee_maj'=>$annee_maj
                

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('znieff')->with('message', $message);
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
        $znieff= znieff_ddt38::find($id);
        return view('znieffs.edit',compact('znieff'))->with('znieff', $znieff);
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
       DB::table('znieff_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'nom_znieff'=>$request->nom_znieff,
            'type_znieff'=>$request->type_znieff,
            'annee_maj'=>$request->annee_maj
                )
        );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('znieff')->with('message', $message);
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
            znieff_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('znieff')->with('message', $message);

    }



}
