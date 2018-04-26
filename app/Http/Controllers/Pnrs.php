<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\pnr_ddt38;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Pnrs extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $pnrs = pnr_ddt38::orderBy('nom_pnr')->paginate(10);
     return view('pnrs.index')->with('pnrs', $pnrs);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('pnrs.create');
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
        $nom_pnr=$request->nom_pnr;
        $annee_maj=$request->annee_maj;
       



        pnr_ddt38::insert(
                array(
                'nom_pnr'=>$nom_pnr,
                'annee_maj'=>$annee_maj,
                

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('pnr')->with('message', $message);
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
        $pnr= pnr_ddt38::find($id);
        return view('pnrs.edit',compact('pnr'))->with('pnr', $pnr);
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
       DB::table('pnr_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'nom_pnr'=>$request->nom_pnr,
            'annee_maj'=>$request->annee_maj
            

                )
        );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('pnr')->with('message', $message);
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
            pnr_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('pnr')->with('message', $message);

    }



}
