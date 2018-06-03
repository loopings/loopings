<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;

use App\epci_ddt38;


use Illuminate\Http\Request;
use DB;
use Illuminate\Database\QueryException;
class Epcis extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    	$epcis = epci_ddt38::orderBy('nom_groupement')->paginate(5);
    // dd($epcis);
    	return view('epcis.index')->with('epcis', $epcis);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return View('epcis.create');
    }


    public function checkCB($field)
    {
    	if($field=="on"){
    		return true; 

    	}else{
    		return false;
    	}


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
    		$nom_groupement=$request->nom_groupement;
    		$type_epci=$request->type_epci;
    		$code_siren=$request->code_siren;
    		$civilite=$request->civilite;
    		$prenom_president=$request->prenom_president;
    		$nom_president=$request->nom_president;
    		$adresse_siege=$request->adresse_siege;
    		$code_postal=$request->code_postal;
    		$tel=$request->tel;
    		$fax=$request->fax;
    		$courriel=$request->courriel;
    		$site_internet=$request->site_internet;
    		$etat='actuel';
    		$resultat_fusion=null;

    		$vulnerabilite_energetique=$request->vulnerabilite_energetique;

    		$libelle_pdu=$request->libelle_pdu;
    		$etat_avancement_pdu=$request->etat_avancement_pdu;
    		$date_validation_pdu=$request->date_validation_pdu;
    		$lien_doc_pdu=$request->lien_doc_pdu;

    		$libelle_plhi=$request->libelle_plhi;
    		$etat_avancement_plhi=$request->etat_avancement_plhi;
    		$date_validation_plhi=$request->date_validation_plhi;
    		$lien_doc_plhi=$request->lien_doc_plhi;
    		
    		$doc_ofpi=$request->doc_ofpi;
    		$video_epci_foncier=$request->video_epci_foncier;
    		
    		$surface_epci=$request->surface_epci;
    		
    		$dta_opposable=$this->checkCB($request->dta_opposable);
    		$competence_concernee=$request->competence_concernee;
    		$aep=$request->aep;
    		$vulnerabilite_ener_log=$request->vulnerabilite_ener_log;
    		$coproprio_deg_frag=$request->coproprio_deg_frag;
    		$nb_quart_prio=$request->nb_quart_prio;
    		$nb_hab_quart_prio=$request->nb_hab_quart_prio;
    		$recensement_agri_2010=$request->recensement_agri_2010;
    		$culture_decl_année=$request->culture_decl_année;
    		$tab_group_cult_bio=$request->tab_group_cult_bio;
    		$carte_occup_agrico=$request->carte_occup_agrico;
    		$nb_emploi_terri=$request->nb_emploi_terri;
    		$actif_res_tr_terri=$request->actif_res_tr_terri;
    		$actif_res_tr_horsterri=$request->actif_res_tr_horsterri;
    		$nb_actif_res_terri=$request->nb_actif_res_terri;


    		epci_ddt38::insert(
    			array(
    				'nom_groupement'=>$nom_groupement,
    				'type_epci'=>$type_epci,
    				'code_siren'=>$code_siren,
    				'civilite'=>$civilite,
    				'prenom_president'=>$prenom_president,
    				'nom_president'=>$nom_president,
    				'adresse_siege'=>$adresse_siege,
    				'code_postal'=>$code_postal,
    				'tel'=>$tel,
    				'fax'=>$fax,
    				'courriel'=>$courriel,
    				'site_internet'=>$site_internet,
    				'etat'=>$etat,
    				'resultat_fusion'=>$resultat_fusion,
    				'vulnerabilite_energetique'=>$vulnerabilite_energetique,
    				'libelle_pdu'=>$libelle_pdu,
    				'etat_avancement_pdu'=>$etat_avancement_pdu,
    				'date_validation_pdu'=>$date_validation_pdu,
    				'lien_doc_pdu'=>$lien_doc_pdu,
    				'libelle_plhi'=>$libelle_plhi,
    				'etat_avancement_plhi'=>$etat_avancement_plhi,
    				'date_validation_plhi'=>$date_validation_plhi,
    				'lien_doc_plhi'=>$lien_doc_plhi,
    				'doc_ofpi'=>$doc_ofpi,
    				'video_epci_foncier'=>$video_epci_foncier,

    				'surface_epci'=>$surface_epci,
    				'dta_opposable'=>$dta_opposable,
    				'competence_concernee'=>$competence_concernee,
    				'aep'=>$aep,
    				'vulnerabilite_ener_log'=>$vulnerabilite_ener_log,
    				'coproprio_deg_frag'=>$coproprio_deg_frag,
    				'nb_quart_prio'=>$nb_quart_prio,
    				'nb_hab_quart_prio'=>$nb_hab_quart_prio,
    				'recensement_agri_2010'=>$recensement_agri_2010,
    				'culture_decl_année'=>$culture_decl_année,
    				'tab_group_cult_bio'=>$tab_group_cult_bio,
    				'carte_occup_agrico'=>$carte_occup_agrico,
    				'nb_emploi_terri'=>$nb_emploi_terri,
    				'actif_res_tr_terri'=>$actif_res_tr_terri,
    				'actif_res_tr_horsterri'=>$actif_res_tr_horsterri,
    				'nb_actif_res_terri'=>$nb_actif_res_terri


    			)

    		);
    	}catch(QueryException $ex){

    		$message=$ex->getMessage();


    	}


    	return redirect('epci')->with('message', $message);
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

    	$epcis=epci_ddt38::orderBy("nom_groupement")->whereNotIn('id',[$id])->pluck('nom_groupement','id');
    	$epci= epci_ddt38::find($id);
    	return view('epcis.edit',compact('epci'))->with('epci', $epci)
    	->with('epcis', $epcis)  ;
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
    		DB::table('epci_ddt38')
    		->where('id',$id)
    		->update  ( 
    			array(
    				'nom_groupement'=>$request->nom_groupement,
    				'type_epci'=>$request->type_epci,
    				'code_siren'=>$request->code_siren,
    				'civilite'=>$request->civilite,
    				'prenom_president'=>$request->prenom_president,
    				'nom_president'=>$request->nom_president,
    				'adresse_siege'=>$request->adresse_siege,
    				'code_postal'=>$request->code_postal,
    				'tel'=>$request->tel,
    				'fax'=>$request->fax,
    				'courriel'=>$request->courriel,
    				'site_internet'=>$request->site_internet,
    				'etat'=>$request->etat,
    				'resultat_fusion'=>$request->resultat_fusion,
    				'vulnerabilite_energetique'=>$request->vulnerabilite_energetique,
    				'libelle_pdu'=>$request->libelle_pdu,
    				'etat_avancement_pdu'=>$request->etat_avancement_pdu,
    				'date_validation_pdu'=>$request->date_validation_pdu,
    				'lien_doc_pdu'=>$request->lien_doc_pdu,
    				'libelle_plhi'=>$request->libelle_plhi,
    				'etat_avancement_plhi'=>$request->etat_avancement_plhi,
    				'date_validation_plhi'=>$request->date_validation_plhi,
    				'lien_doc_plhi'=>$request->lien_doc_plhi,
    				'doc_ofpi'=>$request->doc_ofpi,
    				'video_epci_foncier'=>$request->video_epci_foncier,
    				'surface_epci'=>$request->surface_epci,

    				'dta_opposable'=>$request->dta_opposable,
    				'competence_concernee'=>$request->competence_concernee,
    				'aep'=>$request->aep,
    				'vulnerabilite_ener_log'=>$request->vulnerabilite_ener_log,
    				'coproprio_deg_frag'=>$request->coproprio_deg_frag,
    				'nb_quart_prio'=>$request->nb_quart_prio,
    				'nb_hab_quart_prio'=>$request->nb_hab_quart_prio,
    				'recensement_agri_2010'=>$request->recensement_agri_2010,
    				'culture_decl_année'=>$request->culture_decl_année,
    				'tab_group_cult_bio'=>$request->tab_group_cult_bio,
    				'carte_occup_agrico'=>$request->carte_occup_agrico,
    				'nb_emploi_terri'=>$request->nb_emploi_terri,
    				'actif_res_tr_terri'=>$request->actif_res_tr_terri,
    				'actif_res_tr_horsterri'=>$request->actif_res_tr_horsterri,
    				'nb_actif_res_terri'=>$request->nb_actif_res_terri,


    			)
    		);

    	}catch(QueryException $ex){

    		$message=$ex->getMessage();
    	}

    	return redirect('epci')->with('message', $message);
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
    		epci_ddt38::destroy($id);
    	}catch(QueryException $ex){

    		$message=$ex->getMessage();
    	}


    	return redirect('epci')->with('message', $message);

    }



}
