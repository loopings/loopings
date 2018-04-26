<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\conteco_ddt38;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Contecos extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $contecos = conteco_ddt38::orderBy('nom_conteco')->paginate(10);
     return view('contecos.index')->with('contecos', $contecos);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('contecos.create');
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
        $nom_conteco=$request->nom_conteco;
        $annee_maj=$request->annee_maj;
       



        conteco_ddt38::insert(
                array(
                'nom_conteco'=>$nom_conteco,
                'annee_maj'=>$annee_maj,
                

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('conteco')->with('message', $message);
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
        $conteco= conteco_ddt38::find($id);
        return view('contecos.edit',compact('conteco'))->with('conteco', $conteco);
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
       DB::table('conteco_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'nom_conteco'=>$request->nom_conteco,
            'annee_maj'=>$request->annee_maj
            

                )
        );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('conteco')->with('message', $message);
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
            conteco_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('conteco')->with('message', $message);

    }



}
