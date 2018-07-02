<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\lienG_ddt38;


use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class LienGs extends Controller   
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

      $lienGs = lienG_ddt38::orderBy('nom')->paginate(10);
     return view('lienGs.index')->with('lienGs', $lienGs);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   
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
        $lienG= lienG_ddt38::find($id);
        return view('lienGs.edit',compact('lienG'))->with('lienG', $lienG);
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
       DB::table('lienG_ddt38')
       ->where('id',$id)
       ->update  ( 
           array(
                'lien'=>$request->lien       
            )
           );

   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('lienG')->with('message', $message);
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }



}
