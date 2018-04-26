<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\dta_ddt38;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Dtas extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $dtas = dta_ddt38::orderBy('nom_dta')->paginate(10);
     return view('dtas.index')->with('dtas', $dtas);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('dtas.create');
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
        $nom_dta=$request->nom_dta;
        $annee_maj=$request->annee_maj;



        dta_ddt38::insert(
                array(
                'nom_dta'=>$nom_dta,
                'annee_maj'=>$annee_maj
         
                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('dta')->with('message', $message);
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
        $dta= dta_ddt38::find($id);
        return view('dtas.edit',compact('dta'))->with('dta', $dta);
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
       DB::table('dta_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'nom_dta'=>$request->nom_dta,
            'annee_maj'=>$request->annee_maj

                )
        );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('dta')->with('message', $message);
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
            dta_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('dta')->with('message', $message);

    }



}
