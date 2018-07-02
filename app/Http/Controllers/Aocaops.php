<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\aocaop_ddt38;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Aocaops extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $aocaops = aocaop_ddt38::orderBy('nom_aocaop')->paginate(10);
     return view('aocaops.index')->with('aocaops', $aocaops);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('aocaops.create');
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
        $nom_aocaop=$request->nom_aocaop;
        $annee_maj=$request->annee_maj;
       



        aocaop_ddt38::insert(
                array(
                'nom_aocaop'=>$nom_aocaop,
                'annee_maj'=>$annee_maj,
                

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('aocaop')->with('message', $message);
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
        $aocaop= aocaop_ddt38::find($id);
        return view('aocaops.edit',compact('aocaop'))->with('aocaop', $aocaop);
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
       DB::table('aocaop_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'nom_aocaop'=>$request->nom_aocaop,
            'annee_maj'=>$request->annee_maj
            

                )
        );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('aocaop')->with('message', $message);
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
            aocaop_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('aocaop')->with('message', $message);

    }



}
