<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\contdigba_ddt38;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Contdigbas extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $contdigbas = contdigba_ddt38::orderBy('nom_contdigba')->paginate(10);
     return view('contdigbas.index')->with('contdigbas', $contdigbas);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('contdigbas.create');
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
        $nom_contdigba=$request->nom_contdigba;
        $annee_maj=$request->annee_maj;
       



        contdigba_ddt38::insert(
                array(
                'nom_contdigba'=>$nom_contdigba,
                'annee_maj'=>$annee_maj,
                

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('contdigba')->with('message', $message);
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
        $contdigba= contdigba_ddt38::find($id);
        return view('contdigbas.edit',compact('contdigba'))->with('contdigba', $contdigba);
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
       DB::table('contdigba_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'nom_contdigba'=>$request->nom_contdigba,
            'annee_maj'=>$request->annee_maj
            

                )
        );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('contdigba')->with('message', $message);
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
            contdigba_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('contdigba')->with('message', $message);

    }



}
