<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\comm_ddt38;
use App\epci_ddt38;
use App\territoires38_ddt38;
use App\scot_ddt38;
use App\agent_car_ddt38;
use App\cham_ddt38;
use App\cads_ddt38;
use App\pnr_ddt38;
use App\ze_ddt38;
use App\dta_ddt38;
use App\uu_ddt38;
use App\au_ddt38;
use App\gemapi_ddt38;
use App\cheau_ddt38;
use App\contdigba_ddt38;
use App\hydroelec_ddt38;
use App\conteco_ddt38;
use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;

class Comms extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    	$search_comm=comm_ddt38::orderBy('nom_comm')->pluck('nom_comm','id');
    	$comms = comm_ddt38::orderBy('nom_comm')->paginate(10);
    	return view('comms.index')->with('comms', $comms)
    	->with('search_comm',$search_comm);
    }

    public function liste(Request $request)
    {

    	$search_comm=comm_ddt38::orderBy('nom_comm')->pluck('nom_comm','id');
    	$comms = DB::table('comm_ddt38')
    	->where('id',$request->idsearch)
    	->paginate(5);
    	return view('comms.index')->with('comms', $comms)
    	->with('search_comm',$search_comm);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 

    	$epcis=epci_ddt38::orderBy("nom_groupement")->pluck('nom_groupement','id');

    	$territoires=territoires38_ddt38::orderBy("nom_terri38")->pluck('nom_terri38','id');

    	$scots=scot_ddt38::orderBy("nom_scot")->pluck('nom_scot','id');

    	$agent_cars=agent_car_ddt38::select(DB::raw("CONCAT(nom_car,'',prenom_car) AS name_car"),'id')->get()->sortBy("name_car")->pluck('name_car','id');

    	$chams=cham_ddt38::select(DB::raw("CONCAT(nom_cham,'',prenom_cham) AS name_cham"),'id')->get()->sortBy("name_cham")->pluck('name_cham','id');

    	$cadss=cads_ddt38::orderBy("instructrice_ddt")->pluck('instructrice_ddt','id');

    	$pnrs=pnr_ddt38::orderBy("nom_pnr")->pluck('nom_pnr','id');

    	$zes=ze_ddt38::orderBy("libelle_ze")->pluck('libelle_ze','id');

    	$dtas=dta_ddt38::orderBy("nom_dta")->pluck('nom_dta','id');
    	$aus=au_ddt38::orderBy("typologie")->pluck('typologie','id');
    	$uus=uu_ddt38::orderBy("libelle_uu")->pluck('libelle_uu','id');
      $gemapis=gemapi_ddt38::orderBy("nom_gemapi")->pluck('nom_gemapi','id');
    	$cheaus=cheau_ddt38::orderBy("nom_cheau")->pluck('nom_cheau','id');
      $contecos=conteco_ddt38::orderBy("nom_conteco")->pluck('nom_conteco','id');
      $hydroelecs=hydroelec_ddt38::orderBy("nom_hydroelec")->pluck('nom_hydroelec','id');
      $contdigbas=contdigba_ddt38::orderBy("nom_contdigba")->pluck('nom_contdigba','id');

    	return View('comms.create')->with('epcis', $epcis)
    	->with('territoires', $territoires)
    	->with('scots', $scots)
    	->with('agent_cars', $agent_cars)
    	->with('chams', $chams)
    	->with('cadss', $cadss)
    	->with('pnrs',$pnrs)
    	->with('zes',$zes)
    	->with('aus',$aus)
    	->with('uus',$uus)
      ->with('gemapis',$gemapis)
      ->with('cheaus',$cheaus)
      ->with('contecos',$contecos)
      ->with('hydroelecs',$hydroelecs)
      ->with('contdigbas',$contdigbas)
    	->with('dtas',$dtas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function checkCB($field)
    {
    	if($field=="on"){
    		return true; 

    	}else{
    		return false;
    	}


    }



    public function store(Request $request)
    {
    	$message=null;
    	try{

    		$code_insee=$request->code_insee;
    		$nom_comm=$request->nom_comm;
    		$telephone=$request->telephone;
    		$fax=$request->fax;
    		$email1=$request->email1;
    		$email2=$request->email2;
    		$surface_hectares=$request->surface_hectares;
    		$nom_maire=$request->nom_maire;
    		$prenom_maire=$request->prenom_maire;
    		$civilite_maire=$request->civilite_maire;
    		$lien_synthavis=$request->lien_synthavis;

        //nombre d'actifs  

    		$nb_actifs=$request->nb_actifs;
    		$nb_actifs_restants=$request->nb_actifs_restants;
    		$nb_actifs_sortants=$request->nb_actifs_sortants ;

        //doc urbanisme

    		$docurba=$request->docurba;
    		$annee_maj_docurba=$request->annee_maj_docurba;

        //enjeux agricoles
    		$lien_enjeuxagri=$request->lien_enjeuxagri;


        // nombre de ménages et de véhicules par ménage
    		$nb_men_tot=$request->nb_men_tot;
    		$nb_men_1veh=$request->nb_men_1veh;
    		$nb_men_2veh=$request->nb_men_2veh;
    		$annee_maj_motor=$request->annee_maj_motor;


          //numérisation doc urba

          $numer_docurba=$this->checkCB($request->numer_docurba);//boolean
          $annee_maj_num_docurba=$request->annee_maj_num_docurba;




          //zone montagne
          $class_zonemontagne=$this->checkCB($request->class_zonemontagne);//boolean
          $liste_hameaux=$request->liste_hameaux;
          $annee_maj_zm=$request->annee_maj_zm;


          //logement
          $objectif_log_cons=$request->objectif_log_cons;
          $scot_dec_objectif=$request->scot_dec_objectif;
          $type_polarite=$request->type_polarite;

          $nb_ppi=$request->nb_ppi;
          
          $loi_sru=$this->checkCB($request->loi_sru);//boolean
          $anne_maj_sru=$request->anne_maj_sru;
          
          

          $video_com_foncier=$request->video_com_foncier;



          //ajoutés
          


          $disposition_opposable=$this->checkCB($request->disposition_opposable);
          $doc_urba_opposable=$request->doc_urba_opposable;
          $date_dern_doc_opposable=$request->date_dern_doc_opposable;

          $tx_amenagement=$request->tx_amenagement;
          
          $competence_urba=$request->competence_urba;
          
          $dern_doc_oppo_num=$request->dern_doc_oppo_num;
          
          $tri=$request->tri;
          $slgri=$request->slgri;
          
          $regl_boisement=$request->regl_boisement;
          
          $zone_nitrate=$request->zone_nitrate;
          
          $captage_prioritaire=$request->captage_prioritaire;
          
          $sdage_deficit_aver=$request->sdage_deficit_aver;
          
          $pgre=$request->pgre;
          
          $sdage_equi_frag=$request->sdage_equi_frag;
          
          
          
          $comm_carrencee=$this->checkCB($request->comm_carrencee);
          
          $comm_exoneree=$this->checkCB($request->comm_exoneree);
          
          $comm_tourist=$request->comm_tourist;
          

          $lien_politique_ville=$request->lien_politique_ville;
          
          $nb_voit_men=$request->nb_voit_men;
          
          $evolution_5=$request->evolution_5;
          
          $territoire_pdu=$request->territoire_pdu;
          
          $territoire_ppa=$request->territoire_ppa;
          
          $territoire_peb=$request->territoire_peb;
          
          $zap=$request->zap;
          
          $paen=$request->paen;
          
          $cdepnaf=$request->cdepnaf;
          
          $epf=$request->epf;
          
          $libelle_plh=$request->libelle_plh;
          $etat_avancement_plh=$request->etat_avancement_plh;
          $date_validation_plh=$request->date_validation_plh;
          $lien_doc_plh=$request->lien_doc_plh;

          

//foreign key/clés étrangères
          $id_agent_car=$request->id_agent_car;
          $id_cham=$request->id_cham;
          $id_scot=$request->id_scot;
          $id_terri38=$request->id_terri38;
          $id_pnr=$request->id_pnr;
          $id_ze=$request->id_ze;
          $id_dta=$request->id_dta;
          $id_uu=$request->id_uu;
          $id_au=$request->id_au;

          $id_epci=$request->id_epci;



          //ajoutés
          
          $id_agent_car2=$request->id_agent_car2;
          $id_cham2=$request->id_cham2;
          $id_cheau=$request->id_cheau;
          $id_hydroelec=$request->id_hydroelec;
          $id_eco=$request->id_eco;
          $id_contdigba=$request->id_contdigba;
          $id_gemapi=$request->id_gemapi;
          
 //liens
          $lien_bddreal=$request->lien_bddreal;     
          $lien_gmaps=$request->lien_gmaps;    
          $lien_insee_chiffres=$request->lien_insee_chiffres;     
          $lien_agriterri38=$request->lien_agriterri38;      
          $lien_geoidecarto=$request->lien_geoidecarto;    
          $lien_dossier_complet_insee=$request->lien_dossier_complet_insee;      
          $lien_admin_francaise=$request->lien_admin_francaise;     
          $lien_asso_maires=$request->lien_asso_maires;
          $lien_synth_risques=$request->lien_synth_risques;
          


          //fusion
          $commune_etat='actuelle';
          

          comm_ddt38::insert(
          	array(
          		'code_insee'=>$code_insee,
          		'nom_comm'=>$nom_comm,
          		'telephone'=>$telephone,
          		'fax'=>$fax,
          		'email1'=>$email1,
          		'email2'=>$email2,
          		'surface_hectares'=>$surface_hectares,
          		'nom_maire'=>$nom_maire,
          		'prenom_maire'=>$prenom_maire,
          		'civilite_maire'=>$civilite_maire,
          		'lien_synthavis'=>$lien_synthavis,
          		'nb_actifs'=>$nb_actifs,
          		'nb_actifs_restants'=>$nb_actifs_restants,
          		'nb_actifs_sortants'=>$nb_actifs_sortants,
          		'docurba'=>$docurba,
          		'annee_maj_docurba'=>$annee_maj_docurba,
          		'lien_enjeuxagri'=>$lien_enjeuxagri,
          		'nb_men_tot'=>$nb_men_tot,
          		'nb_men_1veh'=>$nb_men_1veh,
          		'nb_men_2veh'=>$nb_men_2veh,
          		'annee_maj_motor'=>$annee_maj_motor,
          		'numer_docurba'=>$numer_docurba,
          		'annee_maj_num_docurba'=>$annee_maj_num_docurba,

             'class_zonemontagne'=>$class_zonemontagne,
             'liste_hameaux'=>$liste_hameaux,
             'annee_maj_zm'=>$annee_maj_zm,

             'objectif_log_cons'=>$objectif_log_cons,
             'scot_dec_objectif'=>$scot_dec_objectif,
             'type_polarite'=>$type_polarite,
             'nb_ppi'=>$nb_ppi,
             'loi_sru'=>$loi_sru,
             'anne_maj_sru'=>$anne_maj_sru,
             'video_com_foncier'=>$video_com_foncier,
             'disposition_opposable'=>$disposition_opposable,

             'id_agent_car'=>$id_agent_car,
             'id_cham'=>$id_cham,
             'id_scot'=>$id_scot,
             'id_terri38'=>$id_terri38,
             'id_pnr'=>$id_pnr,
             'id_ze'=>$id_ze,
             'id_dta'=>$id_dta,
             'id_uu'=>$id_uu,
             'id_au'=>$id_au,
             
             'id_epci'=>$id_epci,
             'commune_etat'=>$commune_etat,

             'lien_bddreal'=>$lien_bddreal,      
             'lien_gmaps'=>$lien_gmaps,       
             'lien_insee_chiffres'=>$lien_insee_chiffres,      
             'lien_agriterri38'=>$lien_agriterri38,       
             'lien_geoidecarto'=>$lien_geoidecarto,       
             'lien_dossier_complet_insee'=>$lien_dossier_complet_insee,       
             'lien_admin_francaise'=>$lien_admin_francaise,       
             'lien_asso_maires'=>$lien_asso_maires,
             'lien_synth_risques'=>$lien_synth_risques,
             

             'doc_urba_opposable'=>$doc_urba_opposable ,
             'date_dern_doc_opposable'=>$date_dern_doc_opposable,
             'tx_amenagement'=>$tx_amenagement ,
             'competence_urba'=>$competence_urba,
             'dern_doc_oppo_num'=>$dern_doc_oppo_num,
             'tri'=>$tri,
             'slgri'=>$slgri,
             'regl_boisement'=>$regl_boisement ,
             'zone_nitrate'=>$zone_nitrate ,
             'captage_prioritaire'=>$captage_prioritaire,
             'sdage_deficit_aver'=>$sdage_deficit_aver ,
             'pgre'=>$pgre ,
             'sdage_equi_frag'=>$sdage_equi_frag,
             'id_gemapi'=>$id_gemapi,
             'comm_carrencee'=>$comm_carrencee ,
             'comm_exoneree'=>$comm_exoneree,
             'comm_tourist'=>$comm_tourist ,
             'lien_politique_ville'=>$lien_politique_ville ,
             'nb_voit_men'=>$nb_voit_men,
             'evolution_5'=>$evolution_5,
             'territoire_pdu'=>$territoire_pdu ,
             'territoire_ppa'=>$territoire_ppa ,
             'territoire_peb'=>$territoire_peb ,
             'id_cheau'=>$id_cheau ,
             'id_hydroelec'=>$id_hydroelec ,
             'id_eco'=>$id_eco ,
             'id_contdigba'=>$id_contdigba ,
             'zap'=>$zap,
             'paen'=>$paen ,
             'cdepnaf'=>$cdepnaf,
             'epf'=>$epf,
             'id_agent_car2'=>$id_agent_car2,
             'id_cham2'=>$id_cham2 ,
             'libelle_plh'=>$libelle_plh,
             'etat_avancement_plh'=>$etat_avancement_plh,
             'date_validation_plh'=>$date_validation_plh,
             'lien_doc_plh'=>$lien_doc_plh 

           )

);



}catch(QueryException $ex){

 $message=$ex->getMessage();


}


return redirect('comm')->with('message', $message);
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

    	$epcis=epci_ddt38::orderBy("nom_groupement")->pluck('nom_groupement','id');

    	$territoires=territoires38_ddt38::orderBy("nom_terri38")->pluck('nom_terri38','id');

    	$scots=scot_ddt38::orderBy("nom_scot")->pluck('nom_scot','id');

    	$agent_cars=agent_car_ddt38::select(DB::raw("CONCAT(nom_car,'',prenom_car) AS name_car"),'id')->get()->sortBy("name_car")->pluck('name_car','id');

    	$chams=cham_ddt38::select(DB::raw("CONCAT(nom_cham,'',prenom_cham) AS name_cham"),'id')->get()->sortBy("name_cham")->pluck('name_cham','id');

    	$cadss=cads_ddt38::orderBy("instructrice_ddt")->pluck('instructrice_ddt','id');

    	$pnrs=pnr_ddt38::orderBy("nom_pnr")->pluck('nom_pnr','id');

    	$zes=ze_ddt38::orderBy("libelle_ze")->pluck('libelle_ze','id');

    	$dtas=dta_ddt38::orderBy("nom_dta")->pluck('nom_dta','id');
    	$aus=au_ddt38::orderBy("typologie")->pluck('typologie','id');
    	$uus=uu_ddt38::orderBy("libelle_uu")->pluck('libelle_uu','id');
    	$cucss=cucs_ddt38::orderBy("nom_cucs")->pluck('nom_cucs','id');


    	$comm= comm_ddt38::find($id);


    	return view('comms.edit',compact('comm'))->with('comm', $comm)
    	->with('epcis', $epcis)
    	->with('territoires', $territoires)
    	->with('scots', $scots)
    	->with('agent_cars', $agent_cars)
    	->with('chams', $chams)
    	->with('cadss', $cadss)
    	->with('pnrs',$pnrs)
    	->with('zes',$zes)
    	->with('aus',$aus)
    	->with('uus',$uus)
    	->with('cucss',$cucss)
    	->with('dtas',$dtas);
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
    		DB::table('comm_ddt38')
    		->where('id',$id)
    		->update  ( 
    			array(

            //généralité
    				'code_insee'=>$request->code_insee,
    				'nom_comm'=>$request->nom_comm,
    				'telephone'=>$request->telephone,
    				'fax'=>$request->fax,
    				'email1'=>$request->email1,
    				'email2'=>$request->email2,
    				'surface_hectares'=>$request->surface_hectares,
    				'nom_maire'=>$request->nom_maire,
    				'prenom_maire'=>$request->prenom_maire,
    				'civilite_maire'=>$request->civilite_maire,
    				'lien_synthavis'=>$request->lien_synthavis,  

             //nombre d'actifs 
    				'nb_actifs'=>$request->nb_actifs,
    				'nb_actifs_restants'=>$request->nb_actifs_restants,
    				'nb_actifs_sortants'=>$request->nb_actifs_sortants,

              //doc urbanisme
    				'docurba'=>$request->docurba,
    				'annee_maj_docurba'=>$request->annee_maj_docurba,

           //enjeux agricoles
    				'lien_enjeuxagri'=>$request->lien_enjeuxagri,

            // nombre de ménages et de véhicules par ménage
    				'nb_men_tot'=>$request->nb_men_tot,
    				'nb_men_1veh'=>$request->nb_men_1veh,
    				'nb_men_2veh'=>$request->nb_men_2veh,
    				'annee_maj_motor'=>$request->annee_maj_motor,

            //numérisation doc urba
          'numer_docurba'=>$this->checkCB($request->numer_docurba),//boolean
          'annee_maj_num_docurba'=>$request->annee_maj_num_docurba,



            //zone montagne
          'class_zonemontagne'=>$this->checkCB($request->class_zonemontagne),//boolean

          'liste_hameaux'=>$request->liste_hameaux,

          'annee_maj_zm'=>$request->annee_maj_zm,


            //logement
          'objectif_log_cons'=>$request->objectif_log_cons,
          'scot_dec_objectif'=>$request->scot_dec_objectif,
          'type_polarite'=>$request->type_polarite,
          'nb_ppi'=>$request->nb_ppi,
          'loi_sru'=>$this->checkCB($request->loi_sru),//boolean
          'anne_maj_sru'=>$request->anne_maj_sru,
          'video_com_foncier'=>$request->video_com_foncier,


            //foreign key 
          'id_agent_car'=>$request->id_agent_car,
          'id_cham'=>$request->id_cham,
          'id_scot'=>$request->id_scot,
          'id_terri38'=>$request->id_terri38,
          'id_pnr'=>$request->id_pnr,
          'id_ze'=>$request->id_ze,
          'id_dta'=>$request->id_dta,
          'id_uu'=>$request->id_uu,
          'id_au'=>$request->id_au,
          'id_epci'=>$request->id_epci,

            //fusion
          'commune_etat'=>$request->commune_etat,
          'resultat_fusion'=>$request->resultat_fusion,

           //lien
          'lien_bddreal'=>$request->lien_bddreal,     
          'lien_gmaps'=>$request->lien_gmaps,      
          'lien_insee_chiffres'=>$request->lien_insee_chiffres,     
          'lien_agriterri38'=>$request->lien_agriterri38,      
          'lien_geoidecarto'=>$request->lien_geoidecarto,      
          'lien_dossier_complet_insee'=>$request->lien_dossier_complet_insee,      
          'lien_admin_francaise'=>$request->lien_admin_francaise,      
          'lien_asso_maires'=>$request->lien_asso_maires,
          'lien_synth_risques'=>$request->lien_synth_risques



        )
    		);

    	}catch(QueryException $ex){

    		$message=$ex->getMessage();
    	}

    	return redirect('comm')->with('message', $message);
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
    		comm_ddt38::destroy($id);
    	}catch(QueryException $ex){

    		$message=$ex->getMessage();
    	}


    	return redirect('comm')->with('message', $message);

    }





  }