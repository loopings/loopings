<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\cf_ddt38;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Cfs extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $cfs = cf_ddt38::orderBy('demarche_en_cours')->paginate(10);
     return view('cfs.index')->with('cfs', $cfs);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('cfs.create');
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
   
        $annee_maj=$request->annee_maj;
        $demarche_en_cours=$request->demarche_en_cours;
        $tx_bois=$request->tx_bois; 
        $existence_reg_bois=$request->existence_reg_bois; 
        $existence_for_prot=$request->existence_for_prot;


        cf_ddt38::insert(
                array(
            
                'annee_maj'=>$annee_maj,
                'demarche_en_cours'=>$demarche_en_cours,
                'tx_bois'=>$tx_bois,
                'existence_reg_bois' =>$existence_reg_bois,
                'existence_for_prot'=>$existence_for_prot
  
                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('cf')->with('message', $message);
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
        $cf= cf_ddt38::find($id);
        return view('cfs.edit',compact('cf'))->with('cf', $cf);
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
       DB::table('cf_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'annee_maj'=>$request->annee_maj,
            'demarche_en_cours'=>$request->demarche_en_cours,
            'tx_bois'=>$request->tx_bois,
            'existence_reg_bois' =>$request->existence_reg_bois,
            'existence_for_prot'=>$request->existence_for_prot

                )
        );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('cf')->with('message', $message);
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
            cf_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('cf')->with('message', $message);

    }



}
