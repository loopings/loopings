<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\colgestass_ddt38;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Colgestasss extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $colgestasss = colgestass_ddt38::orderBy('nom_colgestass')->paginate(10);
     return view('colgestasss.index')->with('colgestasss', $colgestasss);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('colgestasss.create');
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
        $nom_colgestass=$request->nom_colgestass;
        $annee_maj=$request->annee_maj;
       



        colgestass_ddt38::insert(
                array(
                'nom_colgestass'=>$nom_colgestass,
                'annee_maj'=>$annee_maj,
                

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('colgestass')->with('message', $message);
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
        $colgestass= colgestass_ddt38::find($id);
        return view('colgestasss.edit',compact('colgestass'))->with('colgestass', $colgestass);
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
       DB::table('colgestass_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'nom_colgestass'=>$request->nom_colgestass,
            'annee_maj'=>$request->annee_maj
            

                )
        );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('colgestass')->with('message', $message);
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
            colgestass_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('colgestass')->with('message', $message);

    }



}
