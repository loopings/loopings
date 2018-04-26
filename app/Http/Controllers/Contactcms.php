<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\contactcm_ddt38;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Contactcms extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $contactcms = contactcm_ddt38::orderBy('nom_contactcm')->paginate(10);
     return view('contactcms.index')->with('contactcms', $contactcms);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('contactcms.create');
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
        $nom_contactcm=$request->nom_contactcm;
        $annee_maj=$request->annee_maj;
       



        contactcm_ddt38::insert(
                array(
                'nom_contactcm'=>$nom_contactcm,
                'annee_maj'=>$annee_maj,
                

                )

            );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('contactcm')->with('message', $message);
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
        $contactcm= contactcm_ddt38::find($id);
        return view('contactcms.edit',compact('contactcm'))->with('contactcm', $contactcm);
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
       DB::table('contactcm_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
            'nom_contactcm'=>$request->nom_contactcm,
            'annee_maj'=>$request->annee_maj
            

                )
        );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('contactcm')->with('message', $message);
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
            contactcm_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('contactcm')->with('message', $message);

    }



}
