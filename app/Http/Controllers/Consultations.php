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
use App\lien_unique_epci;
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
use App\assoc_res_strat;
use App\assoc_aoc_aop;
use App\assoc_tepos_pepcv;
use App\assoc_pfre;
use App\assoc_contact_cm;

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
use App\resstrat_ddt38;
use App\gemapi_ddt38;
use App\colgestass_ddt38;
use App\colgesteaup_ddt38;
use App\colcompeaup_ddt38;
use App\colcompeauu_ddt38;
use App\aocaop_ddt38;
use App\pcaet_ddt38;
use App\tepospepcv_ddt38;
use App\pfre_ddt38;
use App\contactcm_ddt38;

class Consultations extends Controller
{
    //
  public function index()
  {

    $search_comm=DB::table('comm_ddt38')->orderBy('nom_comm')->pluck('nom_comm','id');
    $search_epci=DB::table('epci_ddt38')->orderBy('nom_groupement')->pluck('nom_groupement','id');

    return view('consultations.index')
    ->with('search_epci', $search_epci)
    ->with('search_comm', $search_comm);
  }

  public function voirComm(Request $request)
  {
   $comm=comm_ddt38::find($request->idsearch);
   $resultat_fusion=comm_ddt38::find($comm->resultat_fusion);
   $populations=population_comm_ddt38::where('id_comm',$request->idsearch)->get();
   //affichage données EPCI à l'échelle communale
   $epci=epci_ddt38::find($comm->id_epci);
   $pcaets=DB::table('pcaet_ddt38')->where('id_epci',$epci->id)->get();
   
   //tepospepcv
   $assoc_tepos_pepcv=DB::table('assoc_tepos_pepcv')->where('id_epci',$epci->id)->get();
   $tepospepcvs=tepospepcv_ddt38::find($assoc_tepos_pepcv->pluck('id_tp'));

  //PFRE
   $assoc_pfre=DB::table('assoc_pfre')->where('id_epci',$epci->id)->get();
   $pfres=pfre_ddt38::find($assoc_pfre->pluck('id_pfre'));
   //

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
   $gemapi=gemapi_ddt38::find($comm->id_gemapi);
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

 //ressources stratégiques
   $assoc_res_strat=DB::table('assoc_res_strat')->where('id_comm',$request->idsearch)->get();
   $resstrats=resstrat_ddt38::find($assoc_res_strat->pluck('id_res_strat'));


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


      //GESTASS
   $assoc_col_gest_ass=DB::table('assoc_col_gest_ass')->where('id_comm',$request->idsearch)->get();
   $colgestasss=colgestass_ddt38::find($assoc_col_gest_ass->pluck('id_col'));

      //GESTEAUP
   $assoc_col_gest_eaup=DB::table('assoc_col_gest_eaup')->where('id_comm',$request->idsearch)->get();
   $colgesteaups=colgesteaup_ddt38::find($assoc_col_gest_eaup->pluck('id_col'));

      //COMPEAUP
   $assoc_comp_eaup=DB::table('assoc_comp_eaup')->where('id_comm',$request->idsearch)->get();
   $colcompeaups=colcompeaup_ddt38::find($assoc_comp_eaup->pluck('id_col'));

      //COMPEAUU
   $assoc_comp_eauu=DB::table('assoc_comp_eauu')->where('id_comm',$request->idsearch)->get();
   $colcompeauus=colcompeauu_ddt38::find($assoc_comp_eauu->pluck('id_col'));



   //STEP
   $assoc_step=DB::table('assoc_step')->where('id_comm',$request->idsearch)->get();
   $steps=step_ddt38::find($assoc_step->pluck('id_step'));

      //AOC AOP
   $assoc_aoc_aop=DB::table('assoc_aoc_aop')->where('id_comm',$request->idsearch)->get();
   $aocaops=aocaop_ddt38::find($assoc_aoc_aop->pluck('id_aoc_aop'));

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
     ->with('pcaets',$pcaets)
     ->with('tepospepcvs',$tepospepcvs)
     ->with('pfres',$pfres)
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
     ->with('resstrats',$resstrats)
     ->with('gemapi',$gemapi)
     ->with('barrages',$barrages)
     ->with('cfs',$cfs)
     ->with('crs',$crs)
     ->with('digues',$digues)
     ->with('sages',$sages)
     ->with('colgestasss',$colgestasss)
     ->with('colgesteaups',$colgesteaups)
     ->with('colcompeaups',$colcompeaups)
     ->with('colcompeauus',$colcompeauus)
     ->with('steps',$steps)
     ->with('cucs',$cucs)
     ->with('quartiers',$quartiers)
     ->with('zus',$zus)
     ->with('lgmts',$lgmts)
     ->with('agricultures',$agricultures)
     ->with('aocaops',$aocaops)
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
   //affichage données EPCI à l'échelle communale
     $epci=epci_ddt38::find($comm->id_epci);
     $pcaets=DB::table('pcaet_ddt38')->where('id_epci',$epci->id)->get();
      //tepospepcv
     $assoc_tepos_pepcv=DB::table('assoc_tepos_pepcv')->where('id_epci',$epci->id)->get();
     $tepospepcvs=tepospepcv_ddt38::find($assoc_tepos_pepcv->pluck('id_tp'));
   //
     //PFRE
     $assoc_pfre=DB::table('assoc_pfre')->where('id_epci',$epci->id)->get();
     $pfres=pfre_ddt38::find($assoc_pfre->pluck('id_pfre'));
   //
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
     $gemapi=gemapi_ddt38::find($comm->id_gemapi);
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
     $assoc_captage=DB::table('assoc_captage')->where('id_comm',$id)->get();
     $captages=captage_ddt38::find($assoc_captage->pluck('id_captage'));

    //ressources stratégiques
     $assoc_res_strat=DB::table('assoc_res_strat')->where('id_comm',$id)->get();
     $resstrats=resstrat_ddt38::find($assoc_res_strat->pluck('id_res_strat'));

   //chartes forestières cf
     $assoc_cf=DB::table('assoc_cf')->where('id_comm',$id)->get();
     $cfs=cf_ddt38::find($assoc_cf->pluck('id_chforest'));

   //contrats rivières cr
     $assoc_cr=DB::table('assoc_cm')->where('id_comm',$id)->get();
     $crs=cm_ddt38::find($assoc_cr->pluck('id_contrat_riviere'));

   //digues
     $assoc_digues=DB::table('assoc_digues')->where('id_comm',$id)->get();
     $digues=digues_ddt38::find($assoc_digues->pluck('id_digue'));

   //SAGE
     $assoc_sage=DB::table('assoc_sage')->where('id_comm',$id)->get();
     $sages=sage_ddt38::find($assoc_sage->pluck('id_sage'));
      //GESTASS
     $assoc_col_gest_ass=DB::table('assoc_col_gest_ass')->where('id_comm',$id)->get();
     $colgestasss=colgestass_ddt38::find($assoc_col_gest_ass->pluck('id_col'));

      //GESTEAUP
     $assoc_col_gest_eaup=DB::table('assoc_col_gest_eaup')->where('id_comm',$id)->get();
     $colgesteaups=colgesteaup_ddt38::find($assoc_col_gest_eaup->pluck('id_col'));

      //COMPEAUP
     $assoc_comp_eaup=DB::table('assoc_comp_eaup')->where('id_comm',$id)->get();
     $colcompeaups=colcompeaup_ddt38::find($assoc_comp_eaup->pluck('id_col'));

      //COMPEAUU
     $assoc_comp_eauu=DB::table('assoc_comp_eauu')->where('id_comm',$id)->get();
     $colcompeauus=colcompeauu_ddt38::find($assoc_comp_eauu->pluck('id_col'));



   //STEP
     $assoc_step=DB::table('assoc_step')->where('id_comm',$id)->get();
     $steps=step_ddt38::find($assoc_step->pluck('id_step'));

    //AOC AOP
     $assoc_aoc_aop=DB::table('assoc_aoc_aop')->where('id_comm',$id)->get();
     $aocaops=aocaop_ddt38::find($assoc_aoc_aop->pluck('id_aoc_aop'));
    //Tronçons
     $troncons=troncons_ddt38::where('id_comm',$id)->get();

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
     $lienGs=lienG_ddt38::orderBy('nom')->get();

     return view('consultations.commune')->with('comm',$comm)
     ->with('resultat_fusion',$resultat_fusion)
     ->with('populations',$populations)
     ->with ('epci',$epci)
     ->with('pcaets',$pcaets)
     ->with('tepospepcvs',$tepospepcvs)
     ->with('pfres',$pfres)
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
     ->with('resstrats',$resstrats)
     ->with('gemapi',$gemapi)
     ->with('zps',$zps)
     ->with('barrages',$barrages)
     ->with('cfs',$cfs)
     ->with('crs',$crs)
     ->with('digues',$digues)
     ->with('sages',$sages)
     ->with('colgestasss',$colgestasss)
     ->with('colgesteaups',$colgesteaups)
     ->with('colcompeaups',$colcompeaups)
     ->with('colcompeauus',$colcompeauus)
     ->with('steps',$steps)
     ->with('cucs',$cucs)
     ->with('quartiers',$quartiers)
     ->with('zus',$zus)
     ->with('lgmts',$lgmts)
     ->with('agricultures',$agricultures)
     ->with('aocaops',$aocaops)
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

   public function voirEPCI(Request $request)
   {
    $epci=epci_ddt38::find($request->idsearch);
    $comms=DB::table('comm_ddt38')
    ->where('id_epci',$epci->id)
    ->orderBy('nom_comm')
    ->get();

    $populations=
    DB::table('comm_ddt38')
    ->join('population_comm_ddt38', 'comm_ddt38.id', '=', 'population_comm_ddt38.id_comm')
    ->where('comm_ddt38.id_epci',$epci->id)
    ->select('population_comm_ddt38.annee', DB::raw('SUM(population_comm_ddt38.population) as population'))
    ->groupBy('population_comm_ddt38.annee')
    ->orderBy('population_comm_ddt38.annee')
    ->get();

    $scots=
    DB::table('scot_ddt38')
    ->join('comm_ddt38', 'scot_ddt38.id', '=', 'comm_ddt38.id_scot')
    ->where('comm_ddt38.id_epci',$epci->id)
    ->distinct()
    ->get(['scot_ddt38.nom_scot']);
    ;

    $pnrs=
    DB::table('pnr_ddt38')
    ->join('comm_ddt38', 'pnr_ddt38.id', '=', 'comm_ddt38.id_pnr')
    ->where('comm_ddt38.id_epci',$epci->id)
    ->distinct()
    ->get(['pnr_ddt38.nom_pnr','pnr_ddt38.annee_maj']);
    ;

    $lienGs=lienG_ddt38::orderBy('nom')->get();

    $tris=
    DB::table('comm_ddt38')
    ->where('id_epci',$epci->id)
    ->distinct()
    ->get(['comm_ddt38.tri'])
    ;

    $slgris=
    DB::table('comm_ddt38')
    ->where('id_epci',$epci->id)
    ->distinct()
    ->get(['comm_ddt38.slgri'])
    ;
    $zms=
    DB::table('comm_ddt38')
    ->where([
      ['id_epci',$epci->id],
      ['sdage_deficit_aver','<>','non'],
      ['sdage_deficit_aver','<>','NON']
    ])
    ->get()
    ;

    $resstrats=
    DB::table('assoc_res_strat')
    ->join('comm_ddt38', 'assoc_res_strat.id_comm', '=', 'comm_ddt38.id')
    ->where('comm_ddt38.id_epci',$epci->id)
    ->join('resstrat_ddt38', 'resstrat_ddt38.id', '=', 'assoc_res_strat.id_res_strat')
    ->select('resstrat_ddt38.nom_resstrat','resstrat_ddt38.annee_maj')
    ->orderBy('resstrat_ddt38.nom_resstrat')
    ->distinct()
    ->get();

    //peut poser problème
    $sdage_deficits=
    DB::table('comm_ddt38')
    ->where([
      ['id_epci',$epci->id],
      ['sdage_deficit_aver','<>','non'],
      ['sdage_deficit_aver','<>','NON']
    ])
    ->get()
    ;
    
    //peut poser problème
    $sdage_equis=
    DB::table('comm_ddt38')
    ->where([
      ['id_epci',$epci->id],
      ['sdage_equi_frag','<>','non'],
      ['sdage_equi_frag','<>','NON']
    ])  
    ->get()
    ;

      //peut poser problème
    $pgres=
    DB::table('comm_ddt38')
    ->where([
      ['id_epci',$epci->id],
      ['pgre','<>','non'],
      ['pgre','<>','NON']
    ])   
    ->get()
    ;

    $gemapis=
    DB::table('gemapi_ddt38')
    ->join('comm_ddt38', 'gemapi_ddt38.id', '=', 'comm_ddt38.id_gemapi')
    ->where('comm_ddt38.id_epci',$epci->id)
    ->distinct()
    ->get()
    ;
    

    //assoc ecpi
    $assoc_contact_cm=DB::table('assoc_contact_cm')->where('id_epci',$epci->id)->get();
    $contactcms=contactcm_ddt38::find($assoc_contact_cm->pluck('id_contact'));

    //somme des cm des communes
    $cms=
    DB::table('assoc_cm')
    ->join('comm_ddt38', 'assoc_cm.id_comm', '=', 'comm_ddt38.id')
    ->where('comm_ddt38.id_epci',$epci->id)
    ->join('cm_ddt38', 'cm_ddt38.id', '=', 'assoc_cm.id_cm')
    ->select('cm_ddt38.nom_contrat','cm_ddt38.annee_maj')
    ->orderBy('cm_ddt38.nom_contrat')
    ->distinct()
    ->get();

    $sages=
    DB::table('assoc_sage')
    ->join('comm_ddt38', 'assoc_sage.id_comm', '=', 'comm_ddt38.id')
    ->where('comm_ddt38.id_epci',$epci->id)
    ->join('sage_ddt38', 'sage_ddt38.id', '=', 'assoc_sage.id_sage')
    ->select('sage_ddt38.nom_sage','sage_ddt38.annee_maj','sage_ddt38.contact1','sage_ddt38.contact2','sage_ddt38.lien_gesteau')
    ->orderBy('sage_ddt38.nom_sage')
    ->distinct()
    ->get();

    $colgestasss=
    DB::table('assoc_col_gest_ass')
    ->join('comm_ddt38', 'assoc_col_gest_ass.id_comm', '=', 'comm_ddt38.id')
    ->where('comm_ddt38.id_epci',$epci->id)
    ->join('colgestass_ddt38', 'colgestass_ddt38.id', '=', 'assoc_col_gest_ass.id_col')
    ->select('colgestass_ddt38.nom_colgestass','colgestass_ddt38.annee_maj')
    ->orderBy('colgestass_ddt38.nom_colgestass')
    ->distinct()
    ->get();

    $colgesteaups=
    DB::table('assoc_col_gest_eaup')
    ->join('comm_ddt38', 'assoc_col_gest_eaup.id_comm', '=', 'comm_ddt38.id')
    ->where('comm_ddt38.id_epci',$epci->id)
    ->join('colgesteaup_ddt38', 'colgesteaup_ddt38.id', '=', 'assoc_col_gest_eaup.id_col')
    ->select('colgesteaup_ddt38.nom_colgesteaup','colgesteaup_ddt38.annee_maj')
    ->orderBy('colgesteaup_ddt38.nom_colgesteaup')
    ->distinct()
    ->get();

    $cfs=
    DB::table('assoc_cf')
    ->join('comm_ddt38', 'assoc_cf.id_comm', '=', 'comm_ddt38.id')
    ->where('comm_ddt38.id_epci',$epci->id)
    ->join('cf_ddt38', 'cf_ddt38.id', '=', 'assoc_cf.id_chforest')
    ->select('cf_ddt38.nom_charte','cf_ddt38.annee_maj')
    ->orderBy('cf_ddt38.nom_charte')
    ->distinct()
    ->get();

    $existence_reg_boiss=
    DB::table('comm_ddt38')
    ->where([
      ['id_epci',$epci->id],
      ['existence_reg_bois','<>','non'],
      ['existence_reg_bois','<>','NON']
    ])
    ->get()
    ;

    $existence_for_prots=
    DB::table('comm_ddt38')
    ->where([
      ['id_epci',$epci->id],
      ['existence_for_prot','<>','non'],
      ['existence_for_prot','<>','NON']
    ])
    ->get()
    ;


    $comm_tourists=
    DB::table('comm_ddt38')
    ->where([
      ['id_epci',$epci->id],
      ['comm_tourist','<>','non'],
      ['comm_tourist','<>','NON']
    ])
    ->get()
    ;

    $logements=
    DB::table('comm_ddt38')
    ->join('lgmts_ddt38', 'comm_ddt38.id', '=', 'lgmts_ddt38.id_comm')
    ->where('comm_ddt38.id_epci',$epci->id)
    ->select('lgmts_ddt38.annee', DB::raw('
      SUM(lgmts_ddt38.total_lgmts) as total_lgmts,
      SUM(lgmts_ddt38.resid_princ) as resid_princ,
      SUM(lgmts_ddt38.resid_second) as resid_second,
      SUM(lgmts_ddt38.lgmts_vacants) as lgmts_vacants,
      SUM(lgmts_ddt38.maisons) as maisons,
      SUM(lgmts_ddt38.appartements) as appartements,
      SUM(lgmts_ddt38.lgmts_sociaux) as lgmts_sociaux,
      SUM(lgmts_ddt38.res_princ_av_75) as res_princ_av_75
      '))
    ->groupBy('lgmts_ddt38.annee')
    ->orderBy('lgmts_ddt38.annee')
    ->get();

    $aocaops=
    DB::table('assoc_aoc_aop')
    ->join('comm_ddt38', 'assoc_aoc_aop.id_comm', '=', 'comm_ddt38.id')
    ->where('comm_ddt38.id_epci',$epci->id)
    ->join('aocaop_ddt38', 'aocaop_ddt38.id', '=', 'assoc_aoc_aop.id_aoc_aop')
    ->select('aocaop_ddt38.nom_aocaop','aocaop_ddt38.annee_maj')
    ->orderBy('aocaop_ddt38.nom_aocaop')
    ->distinct()
    ->get();

    $maets=
    DB::table('assoc_maet')
    ->join('comm_ddt38', 'assoc_maet.id_comm', '=', 'comm_ddt38.id')
    ->where('comm_ddt38.id_epci',$epci->id)
    ->join('maet_ddt38', 'maet_ddt38.id', '=', 'assoc_maet.id_maet')
    ->select('maet_ddt38.nom_maet','maet_ddt38.annee_maj')
    ->orderBy('maet_ddt38.nom_maet')
    ->distinct()
    ->get();

    $commune_men=
    DB::table('comm_ddt38')
    ->where('id_epci',$epci->id)
    ->select( DB::raw('
      SUM(nb_men_tot) as nb_men_tot,
      SUM(nb_men_1veh) as nb_men_1veh,
      SUM(nb_men_2veh) as nb_men_2veh,
      SUM(nb_voit_men) as nb_voit_men
      '))
    ->get();

    $comm_pdu=
    DB::table('comm_ddt38')
    ->where([
      ['id_epci',$epci->id],
      ['territoire_pdu','<>','non'],
      ['territoire_pdu','<>','NON']
    ])
    ->get()
    ;

    $comm_ppa=
    DB::table('comm_ddt38')
    ->where([
      ['id_epci',$epci->id],
      ['territoire_ppa','<>','non'],
      ['territoire_ppa','<>','NON']
    ])
    ->get()
    ;

    $comm_peb=
    DB::table('comm_ddt38')
    ->where([
      ['id_epci',$epci->id],
      ['territoire_peb','<>','non'],
      ['territoire_peb','<>','NON']
    ])
    ->get()
    ;

    $pcaets=pcaet_ddt38::where('id_epci',$epci->id)->get();

    //
    $assoc_tepos_pepcv=DB::table('assoc_tepos_pepcv')->where('id_epci',$epci->id)->get();
    $tepospepcvs=tepospepcv_ddt38::find($assoc_tepos_pepcv->pluck('id_tp'));

    //
    $assoc_pfre=DB::table('assoc_pfre')->where('id_epci',$epci->id)->get();
    $pfres=pfre_ddt38::find($assoc_pfre->pluck('id_pfre'));


    $lgmtcs=
    DB::table('comm_ddt38')
    ->join('lgmts_commences_ddt38', 'comm_ddt38.id', '=', 'lgmts_commences_ddt38.id_comm')
    ->where('comm_ddt38.id_epci',$epci->id)
    ->select('lgmts_commences_ddt38.annee', DB::raw('
      SUM(lgmts_commences_ddt38.nb_indiv_pur) as nb_indiv_pur,
      SUM(lgmts_commences_ddt38.nb_indiv_gpes) as nb_indiv_gpes,
      SUM(lgmts_commences_ddt38.nb_collectifs) as nb_collectifs,
      SUM(lgmts_commences_ddt38.nb_residence) as nb_residence
      '))
    ->groupBy('lgmts_commences_ddt38.annee')
    ->orderBy('lgmts_commences_ddt38.annee')
    ->get();


    $comm_zap=
    DB::table('comm_ddt38')
    ->where([
      ['id_epci',$epci->id],
      ['zap','<>','non'],
      ['zap','<>','NON']
    ])
    ->get()
    ;

    $comm_epf=
    DB::table('comm_ddt38')
    ->where([
      ['id_epci',$epci->id],
      ['epf','<>','non'],
      ['epf','<>','NON']
    ])
    ->get()
    ;

    $comm_paen=
    DB::table('comm_ddt38')
    ->where([
      ['id_epci',$epci->id],
      ['paen','<>','non'],
      ['paen','<>','NON']
    ])
    ->get()
    ;

     //LIENS UNIQUES
    $lien_theme1s=lien_unique_epci::where('onglet','Fiche administrative')->orderBy('ordre')->get();
    $lien_theme2s=lien_unique_epci::where('onglet','Ressources naturelles et paysagères')->orderBy('ordre')->get();
    $lien_theme3s=lien_unique_epci::where('onglet','Urbanismes, risques et déplacements')->orderBy('ordre')->get();
    $lien_theme4s=lien_unique_epci::where('onglet','Eau et forêts')->orderBy('ordre')->get();
    $lien_theme5s=lien_unique_epci::where('onglet','Logement et politique de la ville')->orderBy('ordre')->get();
    $lien_theme6s=lien_unique_epci::where('onglet','Agriculture')->orderBy('ordre')->get();
    $lien_theme7s=lien_unique_epci::where('onglet','Air et Bruit')->orderBy('ordre')->get();
    $lien_theme8s=lien_unique_epci::where('onglet','Foncier')->orderBy('ordre')->get();

    return view('consultations.epci')
    ->with('epci',$epci)
    ->with('comms',$comms)
    ->with('populations',$populations)
    ->with('scots',$scots)
    ->with('lienGs',$lienGs)
    ->with('pnrs',$pnrs)
    ->with('tris',$tris)
    ->with('slgris',$slgris)
    ->with('zms',$zms)
    ->with('resstrats',$resstrats)
    ->with('sdage_deficits',$sdage_deficits)
    ->with('sdage_equis',$sdage_equis)
    ->with('pgres',$pgres)
    ->with('gemapis',$gemapis)
    ->with('contactcms',$contactcms)
    ->with('cms',$cms)
    ->with('sages',$sages)
    ->with('colgestasss',$colgestasss)
    ->with('colgesteaups',$colgesteaups)
    ->with('cfs',$cfs)
    ->with('comm_tourists',$comm_tourists)
    ->with('logements',$logements)
    ->with('aocaops',$aocaops)
    ->with('maets',$maets)
    ->with('commune_men',$commune_men)
    ->with('comm_pdu',$comm_pdu)
    ->with('comm_ppa',$comm_ppa)
    ->with('comm_peb',$comm_peb)
    ->with('pcaets',$pcaets)
    ->with('tepospepcvs',$tepospepcvs)
    ->with('pfres',$pfres)
    ->with('lgmtcs',$lgmtcs)
    ->with('comm_paen',$comm_paen)
    ->with('comm_zap',$comm_zap)
    ->with('comm_epf',$comm_epf)
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

  public function voirEpciGet($id)
  {
    $epci=epci_ddt38::find($id);
    $comms=DB::table('comm_ddt38')
    ->where('id_epci',$id)
    ->orderBy('nom_comm')
    ->get();

    $populations=
    DB::table('comm_ddt38')
    ->join('population_comm_ddt38', 'comm_ddt38.id', '=', 'population_comm_ddt38.id_comm')
    ->where('comm_ddt38.id_epci',$id)
    ->select('population_comm_ddt38.annee', DB::raw('SUM(population_comm_ddt38.population) as population'))
    ->groupBy('population_comm_ddt38.annee')
    ->orderBy('population_comm_ddt38.annee')
    ->get();

    $scots=
    DB::table('scot_ddt38')
    ->join('comm_ddt38', 'scot_ddt38.id', '=', 'comm_ddt38.id_scot')
    ->where('comm_ddt38.id_epci',$id)
    ->distinct()
    ->get(['scot_ddt38.nom_scot']);
    ;

    $pnrs=
    DB::table('pnr_ddt38')
    ->join('comm_ddt38', 'pnr_ddt38.id', '=', 'comm_ddt38.id_pnr')
    ->where('comm_ddt38.id_epci',$id)
    ->distinct()
    ->get(['pnr_ddt38.nom_pnr','pnr_ddt38.annee_maj']);
    ;

    $lienGs=lienG_ddt38::orderBy('nom')->get();

    $tris=
    DB::table('comm_ddt38')
    ->where('id_epci',$id)
    ->distinct()
    ->get(['comm_ddt38.tri'])
    ;

    $slgris=
    DB::table('comm_ddt38')
    ->where('id_epci',$id)
    ->distinct()
    ->get(['comm_ddt38.slgri'])
    ;

    $zms=
    DB::table('comm_ddt38')
    ->where([
      ['id_epci',$id],
      ['sdage_deficit_aver','<>','non'],
      ['sdage_deficit_aver','<>','NON']
    ])
    ->get()
    ;

    $resstrats=
    DB::table('assoc_res_strat')
    ->join('comm_ddt38', 'assoc_res_strat.id_comm', '=', 'comm_ddt38.id')
    ->where('comm_ddt38.id_epci',$id)
    ->join('resstrat_ddt38', 'resstrat_ddt38.id', '=', 'assoc_res_strat.id_res_strat')
    ->select('resstrat_ddt38.nom_resstrat','resstrat_ddt38.annee_maj')
    ->orderBy('resstrat_ddt38.nom_resstrat')
    ->distinct()
    ->get();

    //peut poser problème
    $sdage_deficits=
    DB::table('comm_ddt38')
    ->where([
      ['id_epci',$id],
      ['sdage_deficit_aver','<>','non'],
      ['sdage_deficit_aver','<>','NON']
    ])
    ->get()
    ;
    
    //peut poser problème
    $sdage_equis=
    DB::table('comm_ddt38')
    ->where([
      ['id_epci',$id],
      ['sdage_equi_frag','<>','non'],
      ['sdage_equi_frag','<>','NON']
    ])  
    ->get()
    ;

      //peut poser problème
    $pgres=
    DB::table('comm_ddt38')
    ->where([
      ['id_epci',$id],
      ['pgre','<>','non'],
      ['pgre','<>','NON']
    ])   
    ->get()
    ;

    $gemapis=
    DB::table('gemapi_ddt38')
    ->join('comm_ddt38', 'gemapi_ddt38.id', '=', 'comm_ddt38.id_gemapi')
    ->where('comm_ddt38.id_epci',$id)
    ->distinct()
    ->get()
    ;
    

    //assoc ecpi
    $assoc_contact_cm=DB::table('assoc_contact_cm')->where('id_epci',$id)->get();
    $contactcms=contactcm_ddt38::find($assoc_contact_cm->pluck('id_contact'));

    //somme des cm des communes
    $cms=
    DB::table('assoc_cm')
    ->join('comm_ddt38', 'assoc_cm.id_comm', '=', 'comm_ddt38.id')
    ->where('comm_ddt38.id_epci',$id)
    ->join('cm_ddt38', 'cm_ddt38.id', '=', 'assoc_cm.id_cm')
    ->select('cm_ddt38.nom_contrat','cm_ddt38.annee_maj')
    ->orderBy('cm_ddt38.nom_contrat')
    ->distinct()
    ->get();

    $sages=
    DB::table('assoc_sage')
    ->join('comm_ddt38', 'assoc_sage.id_comm', '=', 'comm_ddt38.id')
    ->where('comm_ddt38.id_epci',$id)
    ->join('sage_ddt38', 'sage_ddt38.id', '=', 'assoc_sage.id_sage')
    ->select('sage_ddt38.nom_sage','sage_ddt38.annee_maj','sage_ddt38.contact1','sage_ddt38.contact2','sage_ddt38.lien_gesteau')
    ->orderBy('sage_ddt38.nom_sage')
    ->distinct()
    ->get();

    $colgestasss=
    DB::table('assoc_col_gest_ass')
    ->join('comm_ddt38', 'assoc_col_gest_ass.id_comm', '=', 'comm_ddt38.id')
    ->where('comm_ddt38.id_epci',$id)
    ->join('colgestass_ddt38', 'colgestass_ddt38.id', '=', 'assoc_col_gest_ass.id_col')
    ->select('colgestass_ddt38.nom_colgestass','colgestass_ddt38.annee_maj')
    ->orderBy('colgestass_ddt38.nom_colgestass')
    ->distinct()
    ->get();

    $colgesteaups=
    DB::table('assoc_col_gest_eaup')
    ->join('comm_ddt38', 'assoc_col_gest_eaup.id_comm', '=', 'comm_ddt38.id')
    ->where('comm_ddt38.id_epci',$id)
    ->join('colgesteaup_ddt38', 'colgesteaup_ddt38.id', '=', 'assoc_col_gest_eaup.id_col')
    ->select('colgesteaup_ddt38.nom_colgesteaup','colgesteaup_ddt38.annee_maj')
    ->orderBy('colgesteaup_ddt38.nom_colgesteaup')
    ->distinct()
    ->get();

    $cfs=
    DB::table('assoc_cf')
    ->join('comm_ddt38', 'assoc_cf.id_comm', '=', 'comm_ddt38.id')
    ->where('comm_ddt38.id_epci',$id)
    ->join('cf_ddt38', 'cf_ddt38.id', '=', 'assoc_cf.id_chforest')
    ->select('cf_ddt38.nom_charte','cf_ddt38.annee_maj')
    ->orderBy('cf_ddt38.nom_charte')
    ->distinct()
    ->get();

    $existence_reg_boiss=
    DB::table('comm_ddt38')
    ->where([
      ['id_epci',$id],
      ['existence_reg_bois','<>','non'],
      ['existence_reg_bois','<>','NON']
    ])
    ->get()
    ;

    $existence_for_prots=
    DB::table('comm_ddt38')
    ->where([
      ['id_epci',$id],
      ['existence_for_prot','<>','non'],
      ['existence_for_prot','<>','NON']
    ])
    ->get()
    ;


    $comm_tourists=
    DB::table('comm_ddt38')
    ->where([
      ['id_epci',$id],
      ['comm_tourist','<>','non'],
      ['comm_tourist','<>','NON']
    ])
    ->get()
    ;

    $logements=
    DB::table('comm_ddt38')
    ->join('lgmts_ddt38', 'comm_ddt38.id', '=', 'lgmts_ddt38.id_comm')
    ->where('comm_ddt38.id_epci',$id)
    ->select('lgmts_ddt38.annee', DB::raw('
      SUM(lgmts_ddt38.total_lgmts) as total_lgmts,
      SUM(lgmts_ddt38.resid_princ) as resid_princ,
      SUM(lgmts_ddt38.resid_second) as resid_second,
      SUM(lgmts_ddt38.lgmts_vacants) as lgmts_vacants,
      SUM(lgmts_ddt38.maisons) as maisons,
      SUM(lgmts_ddt38.appartements) as appartements,
      SUM(lgmts_ddt38.lgmts_sociaux) as lgmts_sociaux,
      SUM(lgmts_ddt38.res_princ_av_75) as res_princ_av_75
      '))
    ->groupBy('lgmts_ddt38.annee')
    ->orderBy('lgmts_ddt38.annee')
    ->get();

    $aocaops=
    DB::table('assoc_aoc_aop')
    ->join('comm_ddt38', 'assoc_aoc_aop.id_comm', '=', 'comm_ddt38.id')
    ->where('comm_ddt38.id_epci',$id)
    ->join('aocaop_ddt38', 'aocaop_ddt38.id', '=', 'assoc_aoc_aop.id_aoc_aop')
    ->select('aocaop_ddt38.nom_aocaop','aocaop_ddt38.annee_maj')
    ->orderBy('aocaop_ddt38.nom_aocaop')
    ->distinct()
    ->get();

    $maets=
    DB::table('assoc_maet')
    ->join('comm_ddt38', 'assoc_maet.id_comm', '=', 'comm_ddt38.id')
    ->where('comm_ddt38.id_epci',$id)
    ->join('maet_ddt38', 'maet_ddt38.id', '=', 'assoc_maet.id_maet')
    ->select('maet_ddt38.nom_maet','maet_ddt38.annee_maj')
    ->orderBy('maet_ddt38.nom_maet')
    ->distinct()
    ->get();

    $commune_men=
    DB::table('comm_ddt38')
    ->where('id_epci',$id)
    ->select( DB::raw('
      SUM(nb_men_tot) as nb_men_tot,
      SUM(nb_men_1veh) as nb_men_1veh,
      SUM(nb_men_2veh) as nb_men_2veh,
      SUM(nb_voit_men) as nb_voit_men
      '))
    ->get();

    $comm_pdu=
    DB::table('comm_ddt38')
    ->where([
      ['id_epci',$id],
      ['territoire_pdu','<>','non'],
      ['territoire_pdu','<>','NON']
    ])
    ->get()
    ;

    $comm_ppa=
    DB::table('comm_ddt38')
    ->where([
      ['id_epci',$id],
      ['territoire_ppa','<>','non'],
      ['territoire_ppa','<>','NON']
    ])
    ->get()
    ;

    $comm_peb=
    DB::table('comm_ddt38')
    ->where([
      ['id_epci',$id],
      ['territoire_peb','<>','non'],
      ['territoire_peb','<>','NON']
    ])
    ->get()
    ;

    $pcaets=pcaet_ddt38::where('id_epci',$id)->get();

    //
    $assoc_tepos_pepcv=DB::table('assoc_tepos_pepcv')->where('id_epci',$id)->get();
    $tepospepcvs=tepospepcv_ddt38::find($assoc_tepos_pepcv->pluck('id_tp'));
    
    //
    $assoc_pfre=DB::table('assoc_pfre')->where('id_epci',$id)->get();
    $pfres=pfre_ddt38::find($assoc_pfre->pluck('id_pfre'));

    $lgmtcs=
    DB::table('comm_ddt38')
    ->join('lgmts_commences_ddt38', 'comm_ddt38.id', '=', 'lgmts_commences_ddt38.id_comm')
    ->where('comm_ddt38.id_epci',$id)
    ->select('lgmts_commences_ddt38.annee', DB::raw('
      SUM(lgmts_commences_ddt38.nb_indiv_pur) as nb_indiv_pur,
      SUM(lgmts_commences_ddt38.nb_indiv_gpes) as nb_indiv_gpes,
      SUM(lgmts_commences_ddt38.nb_collectifs) as nb_collectifs,
      SUM(lgmts_commences_ddt38.nb_residence) as nb_residence
      '))
    ->groupBy('lgmts_commences_ddt38.annee')
    ->orderBy('lgmts_commences_ddt38.annee')
    ->get();


    $comm_zap=
    DB::table('comm_ddt38')
    ->where([
      ['id_epci',$id],
      ['zap','<>','non'],
      ['zap','<>','NON']
    ])
    ->get()
    ;

    $comm_epf=
    DB::table('comm_ddt38')
    ->where([
      ['id_epci',$id],
      ['epf','<>','non'],
      ['epf','<>','NON']
    ])
    ->get()
    ;

    $comm_paen=
    DB::table('comm_ddt38')
    ->where([
      ['id_epci',$id],
      ['paen','<>','non'],
      ['paen','<>','NON']
    ])
    ->get()
    ;

     //LIENS UNIQUES
    $lien_theme1s=lien_unique_epci::where('onglet','Fiche administrative')->orderBy('ordre')->get();
    $lien_theme2s=lien_unique_epci::where('onglet','Ressources naturelles et paysagères')->orderBy('ordre')->get();
    $lien_theme3s=lien_unique_epci::where('onglet','Urbanismes, risques et déplacements')->orderBy('ordre')->get();
    $lien_theme4s=lien_unique_epci::where('onglet','Eau et forêts')->orderBy('ordre')->get();
    $lien_theme5s=lien_unique_epci::where('onglet','Logement et politique de la ville')->orderBy('ordre')->get();
    $lien_theme6s=lien_unique_epci::where('onglet','Agriculture')->orderBy('ordre')->get();
    $lien_theme7s=lien_unique_epci::where('onglet','Air et Bruit')->orderBy('ordre')->get();
    $lien_theme8s=lien_unique_epci::where('onglet','Foncier')->orderBy('ordre')->get();



    return view('consultations.epci')
    ->with('epci',$epci)
    ->with('comms',$comms)
    ->with('populations',$populations)
    ->with('scots',$scots)
    ->with('lienGs',$lienGs)
    ->with('pnrs',$pnrs)
    ->with('tris',$tris)
    ->with('slgris',$slgris)
    ->with('zms',$zms)
    ->with('resstrats',$resstrats)
    ->with('sdage_deficits',$sdage_deficits)
    ->with('sdage_equis',$sdage_equis)
    ->with('pgres',$pgres)
    ->with('gemapis',$gemapis)
    ->with('contactcms',$contactcms)
    ->with('cms',$cms)
    ->with('sages',$sages)
    ->with('colgestasss',$colgestasss)
    ->with('colgesteaups',$colgesteaups)
    ->with('cfs',$cfs)
    ->with('comm_tourists',$comm_tourists)
    ->with('logements',$logements)
    ->with('aocaops',$aocaops)
    ->with('maets',$maets)
    ->with('commune_men',$commune_men)
    ->with('comm_pdu',$comm_pdu)
    ->with('comm_ppa',$comm_ppa)
    ->with('comm_peb',$comm_peb)
    ->with('pcaets',$pcaets)
    ->with('tepospepcvs',$tepospepcvs)
    ->with('pfres',$pfres)
    ->with('lgmtcs',$lgmtcs)
    ->with('comm_paen',$comm_paen)
    ->with('comm_zap',$comm_zap)
    ->with('comm_epf',$comm_epf)
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
}

/*
