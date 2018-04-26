<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\lgmts_ddt38;
use App\comm_ddt38;


use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Logements extends Controller   
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

     $logements = DB::table('lgmts_ddt38')

     ->join('comm_ddt38', function ($join) {
        $join->on('lgmts_ddt38.id_comm', '=', 'comm_ddt38.id');})
     ->select( 'lgmts_ddt38.id','id_comm','annee','total_lgmts','lgmts_sociaux','resid_princ','resid_second','lgmts_vacants','maisons','appartements','nom_comm')
     ->orderBy('nom_comm')
     ->orderBy('annee')
     ->paginate(20);

     return view('logements.index')->with('logements', $logements);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {

        $communes=comm_ddt38::orderBy("nom_comm")->pluck('nom_comm','id');
        return View('logements.create')->with('communes', $communes);
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
        $id=strval($request->id).strval($request->annee);
        $id=intval($id);
        


        $id_comm=$request->id;
        $annee=$request->annee;
        $total_lgmts=$request->total_lgmts;
        $resid_princ=$request->resid_princ;
        $resid_second=$request->resid_second;
        $lgmts_vacants=$request->lgmts_vacants;
        $maisons=$request->maisons;
        $appartements=$request->appartements;
        $lgmts_sociaux=$request->lgmts_sociaux;



        lgmts_ddt38::insert(
            array(
                'id'=>$id,
                'id_comm'=>$id_comm,
                'annee'=>$annee,
                
                'total_lgmts'=>$total_lgmts,
                'resid_princ'=>$resid_princ,
                'resid_second'=>$resid_second,
                'lgmts_vacants'=>$lgmts_vacants,
                'maisons'=>$maisons,
                'appartements'=>$appartements,
                'lgmts_sociaux'=>$lgmts_sociaux

                

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('logement')->with('message', $message);
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
        $logement= lgmts_ddt38::find($id);
      
        return view('logements.edit',compact('logement'))->with('logement', $logement);
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
       DB::table('lgmts_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'total_lgmts'=>$request->total_lgmts,
            'resid_princ'=>$request->resid_princ,
            'resid_second'=>$request->resid_second,
            'lgmts_vacants'=>$request->lgmts_vacants,
            'maisons'=>$request->maisons,
            'appartements'=>$request->appartements,
            'lgmts_sociaux'=>$request->lgmts_sociaux

            )
           );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('logement')->with('message', $message);
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
            lgmts_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('logement')->with('message', $message);

    }



}
