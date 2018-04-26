<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\hydroelec_ddt38;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Hydroelecs extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $hydroelecs = hydroelec_ddt38::orderBy('nom_hydroelec')->paginate(10);
     return view('hydroelecs.index')->with('hydroelecs', $hydroelecs);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('hydroelecs.create');
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
        $nom_hydroelec=$request->nom_hydroelec;
        $annee_maj=$request->annee_maj;
       



        hydroelec_ddt38::insert(
                array(
                'nom_hydroelec'=>$nom_hydroelec,
                'annee_maj'=>$annee_maj,
                

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('hydroelec')->with('message', $message);
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
        $hydroelec= hydroelec_ddt38::find($id);
        return view('hydroelecs.edit',compact('hydroelec'))->with('hydroelec', $hydroelec);
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
       DB::table('hydroelec_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'nom_hydroelec'=>$request->nom_hydroelec,
            'annee_maj'=>$request->annee_maj
            

                )
        );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('hydroelec')->with('message', $message);
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
            hydroelec_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('hydroelec')->with('message', $message);

    }



}
