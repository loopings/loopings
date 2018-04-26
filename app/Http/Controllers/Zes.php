<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\ze_ddt38;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Zes extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $zes = ze_ddt38::orderBy('libelle_ze')->paginate(10);
     return view('zes.index')->with('zes', $zes);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('zes.create');
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
        $libelle_ze=$request->libelle_ze;
        $annee_maj=$request->annee_maj;



        ze_ddt38::insert(
                array(
                'libelle_ze'=>$libelle_ze,
                'annee_maj'=>$annee_maj
         
                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('ze')->with('message', $message);
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
        $ze= ze_ddt38::find($id);
        return view('zes.edit',compact('ze'))->with('ze', $ze);
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
       DB::table('ze_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'libelle_ze'=>$request->libelle_ze,
            'annee_maj'=>$request->annee_maj

                )
        );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('ze')->with('message', $message);
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
            ze_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('ze')->with('message', $message);

    }



}
