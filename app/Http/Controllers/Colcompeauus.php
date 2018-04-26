<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\colcompeauu_ddt38;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Colcompeauus extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
     $colcompeauus = colcompeauu_ddt38::orderBy('nom_colcompeauu')->paginate(10);
     return view('colcompeauus.index')->with('colcompeauus', $colcompeauus);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('colcompeauus.create');
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
        $nom_colcompeauu=$request->nom_colcompeauu;
        $annee_maj=$request->annee_maj;
       



        colcompeauu_ddt38::insert(
                array(
                'nom_colcompeauu'=>$nom_colcompeauu,
                'annee_maj'=>$annee_maj,
                

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('colcompeauu')->with('message', $message);
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
        $colcompeauu= colcompeauu_ddt38::find($id);
        return view('colcompeauus.edit',compact('colcompeauu'))->with('colcompeauu', $colcompeauu);
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
       DB::table('colcompeauu_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'nom_colcompeauu'=>$request->nom_colcompeauu,
            'annee_maj'=>$request->annee_maj
            

                )
        );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('colcompeauu')->with('message', $message);
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
            colcompeauu_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('colcompeauu')->with('message', $message);

    }



}
