<?php

namespace App\Http\Controllers;


use App\agent_car_ddt38;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use DB;

class Agent_cars extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agent_cars = agent_car_ddt38::orderBy('nom_car')->paginate(10);

        return view('agent_cars.index')->with('agent_cars', $agent_cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return View('agent_cars.create');
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
            $nom_car=$request->nom_car;
            $prenom_car=$request->prenom_car;

            agent_car_ddt38::insert(array('nom_car'=>$nom_car,'prenom_car'=>$prenom_car));
        }catch(QueryException $ex){

            $message=$ex->getMessage();


        }

      

        return redirect('agent_car')->with('message', $message);
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
        $agent_car= agent_car_ddt38::find($id);
        return view('agent_cars.edit',compact('agent_car'))->with('agent_car', $agent_car);
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
        DB::table('agent_car_ddt38')
        ->where('id',$id)
        ->update  (  array('nom_car'=>$request->nom_car, 'prenom_car'=>$request->prenom_car  ));
    }catch(QueryException $ex){

        $message=$ex->getMessage();
    }

    return redirect('agent_car')->with('message', $message);
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
            agent_car_ddt38::destroy($id);
        }catch(QueryException $ex){

            $message=$ex->getMessage();
        }


        return redirect('agent_car')->with('message', $message);
    }
}
