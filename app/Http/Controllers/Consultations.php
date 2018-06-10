<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\comm_ddt38;
use App\population_comm_ddt38;
use App\epci_ddt38;
use App\territoires38_ddt38;
use App\scot_ddt38;
use App\cham_ddt38;
use App\agent_car_ddt38;
use App\ze_ddt38;
use App\dta_ddt38;
use App\au_ddt38;
use App\uu_ddt38;
use App\barrages_ddt38;
use App\cucs_ddt38;
use App\quartier_cucsnonzus_ddt38;
use App\zus_ddt38;
use App\lgmts_ddt38;
use App\agriculture_ddt38;
use App\troncons_ddt38;
use App\lgmts_commences_ddt38;
use App\lien_unique;
use App\lienG_ddt38;

use App\assoc_cantons;
use App\assoc_appb;
use App\assoc_maet;
use App\assoc_natura2000;
use App\assoc_znieff;
use App\assoc_zp;
use App\assoc_cm;
use App\assoc_cf;
use App\assoc_digues;
use App\assoc_sage;
use App\assoc_step;
use App\assoc_reserve;
use App\assoc_captage;

use App\cantons_ddt38;
use App\appb_ddt38;
use App\reserve_ddt38;
use App\maet_ddt38;
use App\natura2000_ddt38;
use App\pnr_ddt38;
use App\znieff_ddt38;
use App\zp_ddt38;
use App\cm_ddt38;
use App\cf_ddt38;
use App\digues_ddt38;
use App\sage_ddt38;
use App\step_ddt38;
use App\hydroelec_ddt38;
use App\conteco_ddt38;
use App\contdigba_ddt38;
use App\cheau_ddt38;
use App\captage_ddt38;
class Consultations extends Controller
{
    //
    public function index()
    {

      $search_comm=DB::table('comm_ddt38')->orderBy('nom_comm')->pluck('nom_comm','id');

      return view('consultations.index')->with('search_comm', $search_comm);
  }

  public function voirComm(Request $request)
  {
   $comm=comm_ddt38::find($request->idsearch);
   $resultat_fusion=comm_ddt38::find($comm->resultat_fusion);
   $populations=population_comm_ddt38::where('id_comm',$request->idsearch)->get();
   $epci=epci_ddt38::find($comm->id_epci);
   $terri=territoires38_ddt38::find($comm->id_terri38);
   $scot=scot_ddt38::find($comm->id_scot);
   $cham=cham_ddt38::find($comm->id_cham);
   $cham2=cham_ddt38::find($comm->id_cham2);
   $agent_car=agent_car_ddt38::find($comm->id_agent_car);
   $agent_car2=agent_car_ddt38::find($comm->id_agent_car2);
   $pnr=pnr_ddt38::find($comm->id_pnr);
   $ze=ze_ddt38::find($comm->id_ze);
   $dta=dta_ddt38::find($comm->id_dta);
   $au=au_ddt38::find($comm->id_au);
   $uu=uu_ddt38::find($comm->id_uu);
   $cheau=cheau_ddt38::find($comm->id_cheau);
   $hydroelec=hydroelec_ddt38::find($comm->id_hydroelec);
   $conteco=conteco_ddt38::find($comm->id_eco);
   $contdigba=contdigba_ddt38::find($comm->id_contdigba);
   $cucs=cucs_ddt38::find($comm->id_cucs);

   $barrages=barrages_ddt38::where('id_comm',$request->idsearch)->get();
   $quartiers=quartier_cucsnonzus_ddt38::where('id_comm',$request->idsearch)->get();
   $zus=zus_ddt38::where('id_comm',$request->idsearch)->get();
   $lgmts=lgmts_ddt38::where('id_comm',$request->idsearch)->get();
   $agricultures=agriculture_ddt38::where('id_comm',$request->idsearch)->get();
   $lgmtcs=lgmts_commences_ddt38::where('id_comm',$request->idsearch)->get();
    //cantons
   $assoc_cant=assoc_cantons::where('id_comm',$request->idsearch)->get();
   $cantons=cantons_ddt38::find($assoc_cant->pluck('id_cant'));


    //appb
   $assoc_appb=DB::table('assoc_appb')->where('id_comm',$request->idsearch)->get();

   $appbs=appb_ddt38::find($assoc_appb->pluck('id_appb'));


   //reserve
   $assoc_reserve=DB::table('assoc_reserve')->where('id_comm',$request->idsearch)->get();
   $reserves=reserve_ddt38::find($assoc_reserve->pluck('id_reserve'));

   //maet
   $assoc_maet=DB::table('assoc_maet')->where('id_comm',$request->idsearch)->get();
   $maets=maet_ddt38::find($assoc_maet->pluck('id_maet'));

   //natura 2000

   $assoc_natura2000=DB::table('assoc_natura2000')->where('id_comm',$request->idsearch)->get();
   $natura2000s=natura2000_ddt38::find($assoc_natura2000->pluck('id_natura2000'));

    //znieff    
   $assoc_znieff=DB::table('assoc_znieff')->where('id_comm',$request->idsearch)->get();
   $znieffs=znieff_ddt38::find($assoc_znieff->pluck('id_znieff'));

   //zp
   $assoc_zp=DB::table('assoc_zp')->where('id_comm',$request->idsearch)->get();
   $zps=zp_ddt38::find($assoc_zp->pluck('id_zp'));

   //captage
   $assoc_captage=DB::table('assoc_captage')->where('id_comm',$request->idsearch)->get();
   $captages=captage_ddt38::find($assoc_captage->pluck('id_captage'));

   //chartes forestières cf
   $assoc_cf=DB::table('assoc_cf')->where('id_comm',$request->idsearch)->get();
   $cfs=cf_ddt38::find($assoc_cf->pluck('id_chforest'));

   //contrats rivières cr
   $assoc_cr=DB::table('assoc_cm')->where('id_comm',$request->idsearch)->get();
   $crs=cm_ddt38::find($assoc_cr->pluck('id_contrat_riviere'));


   //digues
   $assoc_digues=DB::table('assoc_digues')->where('id_comm',$request->idsearch)->get();
   $digues=digues_ddt38::find($assoc_digues->pluck('id_digue'));

   //SAGE
   $assoc_sage=DB::table('assoc_sage')->where('id_comm',$request->idsearch)->get();
   $sages=sage_ddt38::find($assoc_sage->pluck('id_sage'));

   //STEP
   $assoc_step=DB::table('assoc_step')->where('id_comm',$request->idsearch)->get();
   $steps=step_ddt38::find($assoc_step->pluck('id_step'));

    //Tronçons

   $troncons=troncons_ddt38::where('id_comm',$request->idsearch)->get();
    /* $assoc_troncons=DB::table('assoc_troncons')->where('id_comm',$request->idsearch)->get();
     $troncons=troncons_ddt38::find($assoc_troncons->pluck('id_tr'));
     */

     //LIENS UNIQUES
     $lien_theme1s=lien_unique::where('onglet','Fiche administrative')->orderBy('ordre')->get();
     $lien_theme2s=lien_unique::where('onglet','Ressources naturelles et paysagères')->orderBy('ordre')->get();
     $lien_theme3s=lien_unique::where('onglet','Urbanismes, risques et déplacements')->orderBy('ordre')->get();
     $lien_theme4s=lien_unique::where('onglet','Eau et forêts')->orderBy('ordre')->get();
     $lien_theme5s=lien_unique::where('onglet','Logement et politique de la ville')->orderBy('ordre')->get();
     $lien_theme6s=lien_unique::where('onglet','Agriculture')->orderBy('ordre')->get();
     $lien_theme7s=lien_unique::where('onglet','Air et Bruit')->orderBy('ordre')->get();
     $lien_theme8s=lien_unique::where('onglet','Foncier')->orderBy('ordre')->get();

     $lienGs=lienG_ddt38::orderBy('nom')->get();
     return view('consultations.commune')->with('comm',$comm)
     ->with('resultat_fusion',$resultat_fusion)
     ->with('populations',$populations)
     ->with ('epci',$epci)
     ->with('terri',$terri)
     ->with('scot',$scot)
     ->with('cantons',$cantons)
     ->with('cham',$cham)
     ->with('cham2',$cham2)
     ->with('agent_car',$agent_car)
     ->with('agent_car2',$agent_car2)
     ->with('appbs',$appbs)
     ->with('reserves',$reserves)
     ->with('maets',$maets)
     ->with('natura2000s',$natura2000s)
     ->with('znieffs',$znieffs)
     ->with('pnr',$pnr)
     ->with('ze',$ze)
     ->with('dta',$dta)
     ->with('au',$au)
     ->with('uu',$uu)
     ->with('zps',$zps)
     ->with('cheau',$cheau)
     ->with('hydroelec',$hydroelec)
     ->with('conteco',$conteco)
     ->with('contdigba',$contdigba)
     ->with('captages',$captages)
     ->with('barrages',$barrages)
     ->with('cfs',$cfs)
     ->with('crs',$crs)
     ->with('digues',$digues)
     ->with('sages',$sages)
     ->with('steps',$steps)
     ->with('cucs',$cucs)
     ->with('quartiers',$quartiers)
     ->with('zus',$zus)
     ->with('lgmts',$lgmts)
     ->with('agricultures',$agricultures)
     ->with('troncons',$troncons)
     ->with('lgmtcs',$lgmtcs)
     ->with('lien_theme1s',$lien_theme1s)
     ->with('lien_theme2s',$lien_theme2s)
     ->with('lien_theme3s',$lien_theme3s)
     ->with('lien_theme4s',$lien_theme4s)
     ->with('lien_theme5s',$lien_theme5s)
     ->with('lien_theme6s',$lien_theme6s)
     ->with('lien_theme7s',$lien_theme7s)
     ->with('lien_theme8s',$lien_theme8s)
     ->with('lienGs',$lienGs)
     ;
 }
 public function voirCommGet($id)
 {
   $comm=comm_ddt38::find($id);
   $resultat_fusion=comm_ddt38::find($comm->resultat_fusion);
   $populations=population_comm_ddt38::where('id_comm',$id)->get();
   $epci=epci_ddt38::find($comm->id_epci);
   $terri=territoires38_ddt38::find($comm->id_terri38);
   $scot=scot_ddt38::find($comm->id_scot);
   $cham=cham_ddt38::find($comm->id_cham);
   $cham2=cham_ddt38::find($comm->id_cham2);
   $agent_car=agent_car_ddt38::find($comm->id_agent_car);
   $agent_car2=agent_car_ddt38::find($comm->id_agent_car2);
   $pnr=pnr_ddt38::find($comm->id_pnr);
   $ze=ze_ddt38::find($comm->id_ze);
   $dta=dta_ddt38::find($comm->id_dta);
   $au=au_ddt38::find($comm->id_au);
   $uu=uu_ddt38::find($comm->id_uu);
   $cheau=cheau_ddt38::find($comm->id_cheau);
   $hydroelec=hydroelec_ddt38::find($comm->id_hydroelec);
   $conteco=conteco_ddt38::find($comm->id_conteco);
   $contdigba=contdigba_ddt38::find($comm->id_contdigba);
   $cucs=cucs_ddt38::find($comm->id_cucs);

   $barrages=barrages_ddt38::where('id_comm',$id)->get();
   $quartiers=quartier_cucsnonzus_ddt38::where('id_comm',$id)->get();
   $zus=zus_ddt38::where('id_comm',$id)->get();
   $lgmts=lgmts_ddt38::where('id_comm',$id)->get();
   $agricultures=agriculture_ddt38::where('id_comm',$id)->get();
   $lgmtcs=lgmts_commences_ddt38::where('id_comm',$id)->get();
    //cantons
   $assoc_cant=assoc_cantons::where('id_comm',$id)->get();
   $cantons=cantons_ddt38::find($assoc_cant->pluck('id_cant'));


    //appb
   $assoc_appb=DB::table('assoc_appb')->where('id_comm',$id)->get();

   $appbs=appb_ddt38::find($assoc_appb->pluck('id_appb'));


   //reserve
   $assoc_reserve=DB::table('assoc_reserve')->where('id_comm',$id)->get();
   $reserves=reserve_ddt38::find($assoc_reserve->pluck('id_reserve'));

   //maet
   $assoc_maet=DB::table('assoc_maet')->where('id_comm',$id)->get();
   $maets=maet_ddt38::find($assoc_maet->pluck('id_maet'));

   //natura 2000

   $assoc_natura2000=DB::table('assoc_natura2000')->where('id_comm',$id)->get();
   $natura2000s=natura2000_ddt38::find($assoc_natura2000->pluck('id_natura2000'));

    //znieff    
   $assoc_znieff=DB::table('assoc_znieff')->where('id_comm',$id)->get();
   $znieffs=znieff_ddt38::find($assoc_znieff->pluck('id_znieff'));

   //zp
   $assoc_zp=DB::table('assoc_zp')->where('id_comm',$id)->get();
   $zps=zp_ddt38::find($assoc_zp->pluck('id_zp'));

    //captage
   $assoc_captage=DB::table('assoc_captage')->where('id_comm',$request->idsearch)->get();
   $captages=captage_ddt38::find($assoc_captage->pluck('id_captage'));

   //chartes forestières cf
   $assoc_cf=DB::table('assoc_cf')->where('id_comm',$id)->get();
   $cfs=cf_ddt38::find($assoc_cf->pluck('id_chforest'));

   //contrats rivières cr
   $assoc_cr=DB::table('assoc_cm')->where('id_comm',$id)->get();
   $crs=cm_ddt38::find($assoc_cm->pluck('id_contrat_riviere'));

   //digues
   $assoc_digues=DB::table('assoc_digues')->where('id_comm',$id)->get();
   $digues=digues_ddt38::find($assoc_digues->pluck('id_digue'));

   //SAGE
   $assoc_sage=DB::table('assoc_sage')->where('id_comm',$id)->get();
   $sages=sage_ddt38::find($assoc_sage->pluck('id_sage'));

   //STEP
   $assoc_step=DB::table('assoc_step')->where('id_comm',$id)->get();
   $steps=step_ddt38::find($assoc_step->pluck('id_step'));

    //Tronçons
   $troncons=troncons_ddt38::where('id_comm',$request->idsearch)->get();

    /* $assoc_troncons=DB::table('assoc_troncons')->where('id_comm',$id)->get();
     $troncons=troncons_ddt38::find($assoc_troncons->pluck('id_tr'));
     */

     //LIENS UNIQUES
     $lien_theme1s=lien_unique::where('onglet','Fiche administrative')->orderBy('ordre')->get();
     $lien_theme2s=lien_unique::where('onglet','Ressources naturelles et paysagères')->orderBy('ordre')->get();
     $lien_theme3s=lien_unique::where('onglet','Urbanismes, risques et déplacements')->orderBy('ordre')->get();
     $lien_theme4s=lien_unique::where('onglet','Eau et forêts')->orderBy('ordre')->get();
     $lien_theme5s=lien_unique::where('onglet','Logement et politique de la ville')->orderBy('ordre')->get();
     $lien_theme6s=lien_unique::where('onglet','Agriculture')->orderBy('ordre')->get();
     $lien_theme7s=lien_unique::where('onglet','Air et Bruit')->orderBy('ordre')->get();
     $lien_theme8s=lien_unique::where('onglet','Foncier')->orderBy('ordre')->get();


     return view('consultations.commune')->with('comm',$comm)
     ->with('resultat_fusion',$resultat_fusion)
     ->with('populations',$populations)
     ->with ('epci',$epci)
     ->with('terri',$terri)
     ->with('scot',$scot)
     ->with('cantons',$cantons)
     ->with('cham',$cham)
     ->with('cham2',$cham2)
     ->with('agent_car',$agent_car)
     ->with('agent_car2',$agent_car2)
     ->with('appbs',$appbs)
     ->with('reserves',$reserves)
     ->with('maets',$maets)
     ->with('natura2000s',$natura2000s)
     ->with('znieffs',$znieffs)
     ->with('pnr',$pnr)
     ->with('ze',$ze)
     ->with('dta',$dta)
     ->with('au',$au)
     ->with('uu',$uu)
     ->with('cheau',$cheau)
     ->with('hydroelec',$hydroelec)
     ->with('conteco',$conteco)
     ->with('contdigba',$contdigba)
     ->with('captages',$captages)
     ->with('zps',$zps)
     ->with('barrages',$barrages)
     ->with('cfs',$cfs)
     ->with('crs',$crs)
     ->with('digues',$digues)
     ->with('sages',$sages)
     ->with('steps',$steps)
     ->with('cucs',$cucs)
     ->with('quartiers',$quartiers)
     ->with('zus',$zus)
     ->with('lgmts',$lgmts)
     ->with('agricultures',$agricultures)
     ->with('troncons',$troncons)
     ->with('lgmtcs',$lgmtcs)
     ->with('lien_theme1s',$lien_theme1s)
     ->with('lien_theme2s',$lien_theme2s)
     ->with('lien_theme3s',$lien_theme3s)
     ->with('lien_theme4s',$lien_theme4s)
     ->with('lien_theme5s',$lien_theme5s)
     ->with('lien_theme6s',$lien_theme6s)
     ->with('lien_theme7s',$lien_theme7s)
     ->with('lien_theme8s',$lien_theme8s)
     ;
 }

 public function voirEPCI(Request $request)
 {
   return 'bonjour';
}
}
