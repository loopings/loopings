<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\cham_ddt38;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Chams extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $chams = cham_ddt38::orderBy('nom_cham')->paginate(10);
       return view('chams.index')->with('chams', $chams);
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('chams.create');
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
        $nom_cham=strtoupper($request->nom_cham);
        $prenom_cham=strtoupper($request->prenom_cham);
        $serv_am=strtoupper($request->serv_am);

        cham_ddt38::insert(array('nom_cham'=>$nom_cham,'prenom_cham'=>$prenom_cham));
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('cham')->with('message', $message);
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
        $cham= cham_ddt38::find($id);
        return view('chams.edit',compact('cham'))->with('cham', $cham);
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
         DB::table('cham_ddt38')
         ->where('id',$id)
         ->update  (  array('nom_cham'=>$request->nom_cham , 'prenom_cham'=>$request->prenom_cham ) );
     }catch(QueryException $ex){

        $message=$ex->getMessage();
    }

    return redirect('cham')->with('message', $message);
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
            cham_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('cham')->with('message', $message);

    }

}
