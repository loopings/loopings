<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\assoc_appb;		
use App\assoc_cantons;		
use App\assoc_cf;		
use App\assoc_cr;		
use App\assoc_digues;		
use App\assoc_icpe;		
use App\assoc_maet;		
use App\assoc_natura2000;		
use App\assoc_sage;		
use App\assoc_step;		
use App\assoc_tronçons;		
use App\assoc_znieff;		
use App\assoc_zp;
use App\comm_ddt38;
use App\cantons_ddt38;


class Assocs extends Controller
{
	public function index(Request $request)
	{
		$comm = DB::table('comm_ddt38')
		->where('id',$request->idsearch)
		->first();

		return view('assocs.index')->with('comm', $comm)
									->with('message', null)
									->with('result',null);
	}


	public function create($type_assoc,$nomtable,$typenom,$nomid,$id)
	{
		$comm = DB::table('comm_ddt38')
		->where('id',$id)
		->first();

		$assocs=DB::table($type_assoc)
		->where('id_comm',$id)
		->get();

		$tables=DB::table($nomtable)
		->orderBy($typenom)
		->get();



		return View('assocs.create')->with('comm', $comm)
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
    	$id_comm=$request->id_comm;

    $type_assoc=$request->type_assoc;

   	$nomid=$request->nomid;

  DB::table($type_assoc)->where('id_comm',$id_comm)->delete();

  if(!empty($request->tables)){
foreach ($request->tables as $key => $table) {
	 DB::table($type_assoc)->insert(
	 	array($nomid=>$table,
            	'id_comm'=>$id_comm
            	));
}

}


    	}catch(QueryException $ex){

    		$message=$ex->getMessage();
    		$result=0;
    	}

	$comm = DB::table('comm_ddt38')
		->where('id',$id_comm)
		->first();



		return view('assocs.index')->with('comm', $comm)
									->with('message',$message)
									->with('result',$result);

    }
}
