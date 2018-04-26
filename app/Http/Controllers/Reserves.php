<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\reserve_ddt38;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Reserves extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $reserves = reserve_ddt38::orderBy('nom_reserve')->paginate(10);
     return view('reserves.index')->with('reserves', $reserves);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('reserves.create');
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
        $nom_reserve=$request->nom_reserve;
        $annee_maj=$request->annee_maj;
       



        reserve_ddt38::insert(
                array(
                'nom_reserve'=>$nom_reserve,
                'annee_maj'=>$annee_maj,
                

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('reserve')->with('message', $message);
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
        $reserve= reserve_ddt38::find($id);
        return view('reserves.edit',compact('reserve'))->with('reserve', $reserve);
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
       DB::table('reserve_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'nom_reserve'=>$request->nom_reserve,
            'annee_maj'=>$request->annee_maj
            

                )
        );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('reserve')->with('message', $message);
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
            reserve_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('reserve')->with('message', $message);

    }



}
