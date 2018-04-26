<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\sage_ddt38;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Sages extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $sages = sage_ddt38::orderBy('nom_sage')->paginate(10);
     return view('sages.index')->with('sages', $sages);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('sages.create');
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
        $nom_sage=$request->nom_sage;
        $lien_gesteau=$request->lien_gesteau;
        $contact1=$request->contact1;
        $contact2=$request->contact2;
        $annee_maj=$request->annee_maj;

        sage_ddt38::insert(array('nom_sage'=>$nom_sage,
            'lien_gesteau'=>$lien_gesteau,
            'contact1'=>$contact1,
            'contact2'=>$contact2,
            'annee_maj'=>$annee_maj

            )
        );
    }catch(QueryException $ex){

        $message=$ex->getMessage();


    }


    return redirect('sage')->with('message', $message);
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
        $sage= sage_ddt38::find($id);
        return view('sages.edit',compact('sage'))->with('sage', $sage);
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
       DB::table('sage_ddt38')
       ->where('id',$id)
       ->update  (  array(
        'nom_sage'=>$request->nom_sage,
        'lien_gesteau'=>$request->lien_gesteau,
        'contact1'=>$request->contact1,
        'contact2'=>$request->contact2,
        'annee_maj'=>$request->annee_maj
        ));
   }catch(QueryException $ex){

    $message=$ex->getMessage();
}

return redirect('sage')->with('message', $message);
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
            sage_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('sage')->with('message', $message);

    }

}
