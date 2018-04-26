<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\zp_ddt38;


use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Zps extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $zps = zp_ddt38::orderBy('id')->paginate(10);
    // dd($zps);
     return view('zps.index')->with('zps', $zps);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('zps.create');
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
       
        $site_patri_remarq=$request->site_patri_remarq; //boolean

        $annee_maj=$request->annee_maj;



        zp_ddt38::insert(
                array(
                'site_patri_remarq'=>$site_patri_remarq,
                'annee_maj'=>$annee_maj

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('zp')->with('message', $message);
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
        $zp= zp_ddt38::find($id);
        return view('zps.edit',compact('zp'))->with('zp', $zp);
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
       DB::table('zp_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            
            'site_patri_remarq'=>($request->site_patri_remarq),
            'annee_maj'=>$request->annee_maj,

                )
        );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('zp')->with('message', $message);
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
            zp_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('zp')->with('message', $message);

    }



}
