<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\territoires38_ddt38;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Territoires extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $territoires = territoires38_ddt38::orderBy('nom_terri38')->paginate(10);
     return view('territoires.index')->with('territoires', $territoires);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('territoires.create');
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
        $nom_terri38=$request->nom_terri38;

        territoires38_ddt38::insert(array('nom_terri38'=>$nom_terri38));
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('territoire')->with('message', $message);
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
        $territoire= territoires38_ddt38::find($id);
        return view('territoires.edit',compact('territoire'))->with('territoire', $territoire);
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
       DB::table('territoires38_ddt38')
       ->where('id',$id)
       ->update  (  array('nom_terri38'=>$request->nom_terri38));
   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('territoire')->with('message', $message);
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
            territoires38_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('territoire')->with('message', $message);

    }

}
