<?php

namespace App\Http\Controllers;


use App\cantons_ddt38;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use DB;
class Cantons extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cantons = cantons_ddt38::orderBy('nom_canton')->paginate(10);

        return view('cantons.index')->with('cantons', $cantons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('cantons.create');
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
         $nom_canton=$request->nom_canton;
         cantons_ddt38::insert(array('nom_canton'=>$nom_canton));

     }catch(QueryException $ex){

        $message=$ex->getMessage();

    }

    return redirect('canton')->with('message', $message);
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "voir";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $canton= cantons_ddt38::find($id);
        return view('cantons.edit',compact('canton'))->with('canton', $canton);
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
        DB::table('cantons_ddt38')
        ->where('id',$id)
        ->update  (  array('nom_canton'=>strtoupper($request->nom_canton)));
    }catch(QueryException $ex){

        $message=$ex->getMessage();
    }

    return redirect('canton')->with('message', $message);


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
            cantons_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('canton')->with('message', $message);

    }
}