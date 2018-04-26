<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\resstrat_ddt38;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Resstrats extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $resstrats = resstrat_ddt38::orderBy('nom_resstrat')->paginate(10);
     return view('resstrats.index')->with('resstrats', $resstrats);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('resstrats.create');
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
        $nom_resstrat=$request->nom_resstrat;
        $annee_maj=$request->annee_maj;
       



        resstrat_ddt38::insert(
                array(
                'nom_resstrat'=>$nom_resstrat,
                'annee_maj'=>$annee_maj,
                

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('resstrat')->with('message', $message);
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
        $resstrat= resstrat_ddt38::find($id);
        return view('resstrats.edit',compact('resstrat'))->with('resstrat', $resstrat);
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
       DB::table('resstrat_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'nom_resstrat'=>$request->nom_resstrat,
            'annee_maj'=>$request->annee_maj
            

                )
        );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('resstrat')->with('message', $message);
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
            resstrat_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('resstrat')->with('message', $message);

    }



}
