<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\icpe_ddt38;


use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Icpes extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $icpes = icpe_ddt38::orderBy('ents_proprietaire')->paginate(10);
    // dd($icpes);
     return view('icpes.index')->with('icpes', $icpes);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('icpes.create');
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
        $ents_proprietaire=$request->ents_proprietaire;
        $activite=$request->activite;
        $classement=$request->classement;
        $annee_maj=$request->annee_maj;
    
        


        icpe_ddt38::insert(
                array(
                'ents_proprietaire'=>$ents_proprietaire,
                'activite'=>$activite,
                'classement'=>$classement,
                'annee_maj'=>$annee_maj,
                

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('icpe')->with('message', $message);
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
        $icpe= icpe_ddt38::find($id);
        return view('icpes.edit',compact('icpe'))->with('icpe', $icpe);
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
       DB::table('icpe_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'ents_proprietaire'=>$request->ents_proprietaire,
            'activite'=>$request->activite,
            'classement'=>$request->classement,
            'annee_maj'=>$request->annee_maj
            
           

                )
        );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('icpe')->with('message', $message);
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
            icpe_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('icpe')->with('message', $message);

    }



}
