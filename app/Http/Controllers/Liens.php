<?php

namespace App\Http\Controllers;


use App\lien_unique;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use DB;

class Liens extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $liens = lien_unique::orderBy('ordre')->orderBy('libelle')->paginate(10);

        

        return view('liens.index')->with('liens', $liens);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $nb_liens = lien_unique::count();
       return View('liens.create')->with('nb_liens',$nb_liens);
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
            $libelle=$request->libelle;
            $onglet=$request->onglet;
            $lien=$request->lien;
            $ordre=$request->ordre;
            lien_unique::insert(array('libelle'=>$libelle,'onglet'=>$onglet,'lien'=>$lien,'ordre'=>$ordre));
        }catch(QueryException $ex){

            $message=$ex->getMessage();


        }

      
        return redirect('lien')->with('message', $message);
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
        $nb_liens = lien_unique::count();
        $lien= lien_unique::find($id);

        return view('liens.edit',compact('lien'))->with('lien', $lien)
                                                ->with('nb_liens', $nb_liens);
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
        DB::table('lien_unique')
        ->where('id',$id)
        ->update  (  array('libelle'=>$request->libelle, 'onglet'=>$request->onglet , 'lien'=>$request->lien,'ordre'=>$request->ordre));
    }catch(QueryException $ex){

        $message=$ex->getMessage();
    }

    return redirect('lien')->with('message', $message);
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
            lien_unique::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('lien')->with('message', $message);
    }
}
