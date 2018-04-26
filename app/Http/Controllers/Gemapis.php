<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\gemapi_ddt38;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Gemapis extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $gemapis = gemapi_ddt38::orderBy('nom_gemapi')->paginate(10);
     return view('gemapis.index')->with('gemapis', $gemapis);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('gemapis.create');
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
        $nom_gemapi=$request->nom_gemapi;
        $annee_maj=$request->annee_maj;
       



        gemapi_ddt38::insert(
                array(
                'nom_gemapi'=>$nom_gemapi,
                'annee_maj'=>$annee_maj,
                

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('gemapi')->with('message', $message);
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
        $gemapi= gemapi_ddt38::find($id);
        return view('gemapis.edit',compact('gemapi'))->with('gemapi', $gemapi);
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
       DB::table('gemapi_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'nom_gemapi'=>$request->nom_gemapi,
            'annee_maj'=>$request->annee_maj
            

                )
        );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('gemapi')->with('message', $message);
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
            gemapi_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('gemapi')->with('message', $message);

    }



}
