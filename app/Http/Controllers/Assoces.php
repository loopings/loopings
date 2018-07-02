<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

use App\epci_ddt38;

use App\assoc_contact_cm;
use App\assoc_tepos_pepcv;
use App\assoc_pfre;


class Assoces extends Controller
{
	public function index(Request $request)
	{
		$epci = DB::table('epci_ddt38')
		->where('id',$request->idsearch)
		->first();

		return view('assoces.index')->with('epci', $epci)
									->with('message', null)
									->with('result',null);
	}


	public function create($type_assoc,$nomtable,$typenom,$nomid,$id)
	{
		$epci = DB::table('epci_ddt38')
		->where('id',$id)
		->first();

		$assocs=DB::table($type_assoc)
		->where('id_epci',$id)
		->get();

		$tables=DB::table($nomtable)
		->orderBy($typenom)
		->get();



		return View('assoces.create')->with('epci', $epci)
									->with('assocs', $assocs)
									->with('tables', $tables)
									->with('nomid',$nomid)
									->with('typenom',$typenom)
									->with('type_assoc',$type_assoc);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    	$result=1;
    	$message='Votre enregistrement a été pris en compte';
    	try{
    	$id_epci=$request->id_epci;

    $type_assoc=$request->type_assoc;

   	$nomid=$request->nomid;

  DB::table($type_assoc)->where('id_epci',$id_epci)->delete();

  if(!empty($request->tables)){
foreach ($request->tables as $key => $table) {
	 DB::table($type_assoc)->insert(
	 	array($nomid=>$table,
            	'id_epci'=>$id_epci
            	));
}

}


    	}catch(QueryException $ex){

    		$message=$ex->getMessage();
    		$result=0;
    	}

	$epci = DB::table('epci_ddt38')
		->where('id',$id_epci)
		->first();



		return view('assoces.index')->with('epci', $epci)
									->with('message',$message)
									->with('result',$result);

    }
}
