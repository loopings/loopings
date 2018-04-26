<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\appb_ddt38;


use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Appbs extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $appbs = appb_ddt38::orderBy('nom_appb')->paginate(10);
    // dd($appbs);
     return view('appbs.index')->with('appbs', $appbs);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('appbs.create');
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
        $nom_appb=$request->nom_appb;
        $etat_appb=$request->etat_appb;
        $annee_maj=$request->annee_maj;
        
        


        appb_ddt38::insert(
                array(
                'nom_appb'=>$nom_appb,
                'etat_appb'=>$etat_appb,
                'annee_maj'=>$annee_maj,
              
                

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('appb')->with('message', $message);
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
        $appb= appb_ddt38::find($id);
        return view('appbs.edit',compact('appb'))->with('appb', $appb);
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
       DB::table('appb_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'nom_appb'=>$request->nom_appb,
            'etat_appb'=>$request->etat_appb,
            'annee_maj'=>$request->annee_maj,
           
           

                )
        );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('appb')->with('message', $message);
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
            appb_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('appb')->with('message', $message);

    }



}
