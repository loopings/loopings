<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\tepospepcv_ddt38;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class tepospepcvs extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $tepospepcvs = tepospepcv_ddt38::orderBy('nom_tepospepcv')->paginate(10);
     return view('tepospepcvs.index')->with('tepospepcvs', $tepospepcvs);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('tepospepcvs.create');
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
        $nom_tepospepcv=$request->nom_tepospepcv;
        $tepos_ou_pepcv=$request->tepos_ou_pepcv;
        $annee_maj=$request->annee_maj;
       



        tepospepcv_ddt38::insert(
                array(
                'nom_tepospepcv'=>$nom_tepospepcv,
                'tepos_ou_pepcv'=>$tepos_ou_pepcv,
                'annee_maj'=>$annee_maj,
                

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('tepospepcv')->with('message', $message);
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
        $tepospepcv= tepospepcv_ddt38::find($id);
        return view('tepospepcvs.edit',compact('tepospepcv'))->with('tepospepcv', $tepospepcv);
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
       DB::table('tepospepcv_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'nom_tepospepcv'=>$request->nom_tepospepcv,
            'tepos_ou_pepcv'=>$request->tepos_ou_pepcv,
            'annee_maj'=>$request->annee_maj
            

                )
        );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('tepospepcv')->with('message', $message);
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
            tepospepcv_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('tepospepcv')->with('message', $message);

    }



}
