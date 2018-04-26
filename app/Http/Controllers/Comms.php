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
use App\cucs_ddt38;
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

      $agent_cars=agent_car_ddt38::select(DB::raw("CONCAT(nom_car,' ',prenom_car) AS name_car"),'id')->get()->sortBy("name_car")->pluck('name_car','id');

      $chams=cham_ddt38::select(DB::raw("CONCAT(nom_cham,' ',prenom_cham) AS name_cham"),'id')->get()->sortBy("name_cham")->pluck('name_cham','id');

      $cadss=cads_ddt38::orderBy("instructrice_ddt")->pluck('instructrice_ddt','id');

      $pnrs=pnr_ddt38::orderBy("nom_pnr")->pluck('nom_pnr','id');

      $zes=ze_ddt38::orderBy("libelle_ze")->pluck('libelle_ze','id');

      $dtas=dta_ddt38::orderBy("nom_dta")->pluck('nom_dta','id');
      $aus=au_ddt38::orderBy("typologie")->pluck('typologie','id');
      $uus=uu_ddt38::orderBy("libelle_uu")->pluck('libelle_uu','id');
      $cucss=cucs_ddt38::orderBy("nom_cucs")->pluck('nom_cucs','id');

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
      ->with('cucss',$cucss)
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

      $code_insee=strtoupper($request->code_insee);
      $nom_comm=strtoupper($request->nom_comm);
      $telephone=strtoupper($request->telephone);
      $fax=strtoupper($request->fax);
      $email1=strtoupper($request->email1);
      $email2=strtoupper($request->email2);
      $surface_hectares=$request->surface_hectares;
      $nom_maire=strtoupper($request->nom_maire);
      $prenom_maire=strtoupper($request->prenom_maire);
      $civilite_maire=strtoupper($request->civilite_maire);
      $lien_synthavis=strtoupper($request->lien_synthavis);

        //nombre d'actifs  

      $nb_actifs=$request->nb_actifs;
      $nb_actifs_restants=$request->nb_actifs_restants;
      $nb_actifs_sortants=$request->nb_actifs_sortants ;

        //doc urbanisme

      $docurba=strtoupper($request->docurba);
      $annee_maj_docurba=date("Y");

        //enjeux agricoles
      $lien_enjeuxagri=strtoupper($request->lien_enjeuxagri);


        // nombre de ménages et de véhicules par ménage
      $nb_men_tot=$request->nb_men_tot;
      $nb_men_1veh=$request->nb_men_1veh;
      $nb_men_2veh=$request->nb_men_2veh;
      $annee_maj_motor=date("Y");


          //numérisation doc urba

          $numer_docurba=$this->checkCB($request->numer_docurba);//boolean
          $annee_maj_num_docurba=date("Y");


          //prescriptioon

          $mise_en_place_ppr=$this->checkCB($request->mise_en_place_ppr);//boolean
          $type_ppr=strtoupper($request->type_ppr);
          $prescri_pprm=$this->checkCB($request->prescri_pprm);//boolean
          $prescri_pprt=$this->checkCB($request->prescri_pprt);//boolean
          $prescri_ppri=$this->checkCB($request->prescri_ppri);//boolean
          $prescri_pprmin=$this->checkCB($request->prescri_pprmin);
          $prescription=$this->checkCB($request->prescription);//boolean
          $anne_maj_ppr=date("Y");

          $valant_pas_ppr=$this->checkCB($request->valant_pas_ppr);//boolean
          $type_pas_ppr=strtoupper($request->type_pas_ppr);
          $pac_pprn=$this->checkCB($request->pac_pprn);//boolean
          $pac_pprt=$this->checkCB($request->pac_pprt);//boolean
          $annee_maj_pas_ppr=date("Y");

          $valant_ppr=$this->checkCB($request->valant_ppr);//boolean
          $type_valant_ppr=strtoupper($request->type_valant_ppr);
          $annee_maj_va_ppr=date("Y");


          //zone montagne
          $class_zonemontagne=$this->checkCB($request->class_zonemontagne);//boolean
          $arrete_20fev1974=strtoupper($request->arrete_20fev1974);
          $arrete_29janv1982=strtoupper($request->arrete_29janv1982);
          $arrete_28avr1976=strtoupper($request->arrete_28avr1976);
          $annee_maj_zm=date("Y");


          //logement
          $objectif_log_cons=strtoupper($request->objectif_log_cons);
          $scot_dec_objectif=$request->scot_dec_objectif;
          $type_polarite=strtoupper($request->type_polarite);
          $nb_lits_touristiques=$request->nb_lits_touristiques;
          $nb_ppi=$request->nb_ppi;
          
          $loi_sru=$this->checkCB($request->loi_sru);//boolean
          $anne_maj_sru=date("Y");
          
          



          //foreign key 
          $id_agent_car=$request->id_agent_car;
          $id_cham=$request->id_cham;
          $id_scot=$request->id_scot;
          $id_terri38=$request->id_terri38;
          $id_pnr=$request->id_pnr;
          $id_ze=$request->id_ze;
          $id_dta=$request->id_dta;
          $id_uu=$request->id_uu;
          $id_au=$request->id_au;
          $id_cucs=$request->id_cucs;
          $id_epci=$request->id_epci;
          $id_cads=$request->id_cads;

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
              'mise_en_place_ppr'=>$mise_en_place_ppr,
              'type_ppr'=>$type_ppr,
              'prescri_pprm'=>$prescri_pprm,
              'prescri_pprt'=>$prescri_pprt,
              'prescri_ppri'=>$prescri_ppri,
              'prescri_pprmin'=>$prescri_pprmin,
              'prescription'=>$prescription,
              'anne_maj_ppr'=>$anne_maj_ppr,
              'valant_pas_ppr'=>$valant_pas_ppr,
              'type_pas_ppr'=>$type_pas_ppr,
              'pac_pprn'=>$pac_pprn,
              'pac_pprt'=>$pac_pprt,
              'annee_maj_pas_ppr'=>$annee_maj_pas_ppr,
              'valant_ppr'=>$valant_ppr,
              'type_valant_ppr'=>$type_valant_ppr,
              'annee_maj_va_ppr'=>$annee_maj_va_ppr,
              'class_zonemontagne'=>$class_zonemontagne,
              'arrete_20fev1974'=>$arrete_20fev1974,
              'arrete_29janv1982'=>$arrete_29janv1982,
              'arrete_28avr1976'=>$arrete_28avr1976,
              'annee_maj_zm'=>$annee_maj_zm,
              'objectif_log_cons'=>$objectif_log_cons,
              'scot_dec_objectif'=>$scot_dec_objectif,
              'type_polarite'=>$type_polarite,
              'nb_lits_touristiques'=>$nb_lits_touristiques,
              'nb_ppi'=>$nb_ppi,
              'loi_sru'=>$loi_sru,
              'anne_maj_sru'=>$anne_maj_sru,
              'id_agent_car'=>$id_agent_car,
              'id_cham'=>$id_cham,
              'id_scot'=>$id_scot,
              'id_terri38'=>$id_terri38,
              'id_pnr'=>$id_pnr,
              'id_ze'=>$id_ze,
              'id_dta'=>$id_dta,
              'id_uu'=>$id_uu,
              'id_au'=>$id_au,
              'id_cucs'=>$id_cucs,
              'id_epci'=>$id_epci,
              'commune_etat'=>$commune_etat,
              'id_cads'=>$id_cads,
              'lien_bddreal'=>$lien_bddreal,      
              'lien_gmaps'=>$lien_gmaps,       
              'lien_insee_chiffres'=>$lien_insee_chiffres,      
              'lien_agriterri38'=>$lien_agriterri38,       
              'lien_geoidecarto'=>$lien_geoidecarto,       
              'lien_dossier_complet_insee'=>$lien_dossier_complet_insee,       
              'lien_admin_francaise'=>$lien_admin_francaise,       
              'lien_asso_maires'=>$lien_asso_maires,
              'lien_synth_risques'=>$lien_synth_risques

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

      $agent_cars=agent_car_ddt38::select(DB::raw("CONCAT(nom_car,' ',prenom_car) AS name_car"),'id')->get()->sortBy("name_car")->pluck('name_car','id');

      $chams=cham_ddt38::select(DB::raw("CONCAT(nom_cham,' ',prenom_cham) AS name_cham"),'id')->get()->sortBy("name_cham")->pluck('name_cham','id');

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
           'code_insee'=>strtoupper($request->code_insee),
           'nom_comm'=>strtoupper($request->nom_comm),
           'telephone'=>strtoupper($request->telephone),
           'fax'=>strtoupper($request->fax),
           'email1'=>strtoupper($request->email1),
           'email2'=>strtoupper($request->email2),
           'surface_hectares'=>$request->surface_hectares,
           'nom_maire'=>strtoupper($request->nom_maire),
           'prenom_maire'=>strtoupper($request->prenom_maire),
           'civilite_maire'=>strtoupper($request->civilite_maire),
           'lien_synthavis'=>strtoupper($request->lien_synthavis),  

             //nombre d'actifs 
           'nb_actifs'=>$request->nb_actifs,
           'nb_actifs_restants'=>$request->nb_actifs_restants,
           'nb_actifs_sortants'=>$request->nb_actifs_sortants,
           
              //doc urbanisme
           'docurba'=>strtoupper($request->docurba),
           'annee_maj_docurba'=>$request->annee_maj_docurba,
           
           //enjeux agricoles
           'lien_enjeuxagri'=>strtoupper($request->lien_enjeuxagri),

            // nombre de ménages et de véhicules par ménage
           'nb_men_tot'=>$request->nb_men_tot,
           'nb_men_1veh'=>$request->nb_men_1veh,
           'nb_men_2veh'=>$request->nb_men_2veh,
           'annee_maj_motor'=>$request->annee_maj_motor,

            //numérisation doc urba
           'numer_docurba'=>$this->checkCB($request->numer_docurba),//boolean
           'annee_maj_num_docurba'=>$request->annee_maj_num_docurba,

            //prescriptions
           'mise_en_place_ppr'=>$this->checkCB($request->mise_en_place_ppr),//boolean
           'type_ppr'=>strtoupper($request->type_ppr),
           'prescri_pprm'=>$this->checkCB($request->prescri_pprm),//boolean
           'prescri_pprt'=>$this->checkCB($request->prescri_pprt),//boolean
           'prescri_ppri'=>$this->checkCB($request->prescri_ppri),//boolean
           'prescri_pprmin'=>$this->checkCB($request->prescri_pprmin),
           'prescription'=>$this->checkCB($request->prescription),//boolean
           'anne_maj_ppr'=>$request->anne_maj_ppr,
           'valant_pas_ppr'=>$this->checkCB($request->valant_pas_ppr),//boolean
           'type_pas_ppr'=>strtoupper($request->type_pas_ppr),
           'pac_pprn'=>$this->checkCB($request->pac_pprn),//boolean
           'pac_pprt'=>$this->checkCB($request->pac_pprt),//boolean
           'annee_maj_pas_ppr'=>$request->annee_maj_pas_ppr,
           'valant_ppr'=>$this->checkCB($request->valant_ppr),//boolean
           'type_valant_ppr'=>strtoupper($request->type_valant_ppr),
           'annee_maj_va_ppr'=>$request->annee_maj_va_ppr,

            //zone montagne
           'class_zonemontagne'=>$this->checkCB($request->class_zonemontagne),//boolean
           'arrete_20fev1974'=>strtoupper($request->arrete_20fev1974),
           'arrete_29janv1982'=>strtoupper($request->arrete_29janv1982),
           'arrete_28avr1976'=>strtoupper($request->arrete_28avr1976),
           'annee_maj_zm'=>$request->annee_maj_zm,


            //logement
           'objectif_log_cons'=>strtoupper($request->objectif_log_cons),
           'scot_dec_objectif'=>$request->scot_dec_objectif,
           'type_polarite'=>strtoupper($request->type_polarite),
           'nb_lits_touristiques'=>$request->nb_lits_touristiques,
           'nb_ppi'=>$request->nb_ppi,
           'loi_sru'=>$this->checkCB($request->loi_sru),//boolean
           'anne_maj_sru'=>$request->anne_maj_sru,
          

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
           'id_cucs'=>$request->id_cucs,
           'id_epci'=>$request->id_epci,
           'id_cads'=>$request->id_cads,

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