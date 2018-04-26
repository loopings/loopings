<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\cads_ddt38;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Cadss extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $cadss = cads_ddt38::orderBy('instructrice_ddt')->paginate(10);
     return view('cadss.index')->with('cadss', $cadss);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('cadss.create');
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
        $instructrice_ddt=$request->instructrice_ddt;

        cads_ddt38::insert(array('instructrice_ddt'=>$instructrice_ddt));
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('cads')->with('message', $message);
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
        $cads= cads_ddt38::find($id);
        return view('cadss.edit',compact('cads'))->with('cads', $cads);
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
       DB::table('cads_ddt38')
       ->where('id',$id)
       ->update  (  array('instructrice_ddt'=>$request->instructrice_ddt));
   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('cads')->with('message', $message);
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
            cads_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('cads')->with('message', $message);

    }

}
