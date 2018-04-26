<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use DB;

class Users extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('name')->paginate(10);

        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return View('users.create');
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
            $nom_car=strtoupper($request->nom_car);
            $prenom_car=strtoupper($request->prenom_car);
            $zonage_car=strtoupper($request->zonage_car);
            agent_car_ddt38::insert(array('nom_car'=>$nom_car,'prenom_car'=>$prenom_car,'zonage_car'=>$zonage_car));
        }catch(QueryException $ex){
            $message=$ex->getMessage();
        }

        return redirect('agent_car')->with('message', $message);
    }
    public function reset($id)
    {
      $user = User::find($id);
      return view('users.reset')->with('userreset', $user);
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
        ->update  (  array('nom_car'=>strtoupper($request->nom_car), 'prenom_car'=>strtoupper($request->prenom_car) , 'zonage_car'=>strtoupper($request->zonage_car)      ));
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
