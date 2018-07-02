<?php

namespace App\Http\Controllers;


use App\lien_unique_epci;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use DB;

class LienEs extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $liens = lien_unique_epci::orderBy('ordre')->orderBy('libelle')->paginate(10);

        

        return view('lienEs.index')->with('liens', $liens);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $nb_liens = lien_unique_epci::count();
       return View('lienEs.create')->with('nb_liens',$nb_liens);
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
            lien_unique_epci::insert(array('libelle'=>$libelle,'onglet'=>$onglet,'lien'=>$lien,'ordre'=>$ordre));
        }catch(QueryException $ex){

            $message=$ex->getMessage();


        }

      
        return redirect('lienE')->with('message', $message);
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
        $nb_liens = lien_unique_epci::count();
        $lien= lien_unique_epci::find($id);

        return view('lienEs.edit',compact('lien'))->with('lien', $lien)
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
        DB::table('lien_unique_epci')
        ->where('id',$id)
        ->update  (  array('libelle'=>$request->libelle, 'onglet'=>$request->onglet , 'lien'=>$request->lien,'ordre'=>$request->ordre));
    }catch(QueryException $ex){

        $message=$ex->getMessage();
    }

    return redirect('lienE')->with('message', $message);
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
            lien_unique_epci::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('lienE')->with('message', $message);
    }
}
