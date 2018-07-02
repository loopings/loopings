<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\pfre_ddt38;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Pfres extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $pfres = pfre_ddt38::orderBy('nom_pfre')->paginate(10);
     return view('pfres.index')->with('pfres', $pfres);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('pfres.create');
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
        $nom_pfre=$request->nom_pfre;
        $annee_maj=$request->annee_maj;
       



        pfre_ddt38::insert(
                array(
                'nom_pfre'=>$nom_pfre,
                'annee_maj'=>$annee_maj,
                

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('pfre')->with('message', $message);
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
        $pfre= pfre_ddt38::find($id);
        return view('pfres.edit',compact('pfre'))->with('pfre', $pfre);
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
       DB::table('pfre_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'nom_pfre'=>$request->nom_pfre,
            'annee_maj'=>$request->annee_maj
            

                )
        );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('pfre')->with('message', $message);
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
            pfre_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('pfre')->with('message', $message);

    }



}
