<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\cucs_ddt38;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Cucss extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $cucss = cucs_ddt38::orderBy('nom_cucs')->paginate(10);
     return view('cucss.index')->with('cucss', $cucss);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('cucss.create');
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
        $nom_cucs=strtoupper($request->nom_cucs);
        $lien_sigvillegouv=strtoupper($request->lien_sigvillegouv);
        $annee_maj_cucs=date("Y");
       



        cucs_ddt38::insert(
                array(
                'nom_cucs'=>$nom_cucs,
                'lien_sigvillegouv'=>$lien_sigvillegouv,
                'annee_maj_cucs'=>$annee_maj_cucs
                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('cucs')->with('message', $message);
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
        $cucs= cucs_ddt38::find($id);
        return view('cucss.edit',compact('cucs'))->with('cucs', $cucs);
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
       DB::table('cucs_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'nom_cucs'=>strtoupper($request->nom_cucs),
            'lien_sigvillegouv'=>strtoupper($request->lien_sigvillegouv),
            'annee_maj_cucs'=>date("Y")
                )
        );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('cucs')->with('message', $message);
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
            cucs_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('cucs')->with('message', $message);

    }



}
