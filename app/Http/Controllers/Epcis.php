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
        $nom_groupement=strtoupper($request->nom_groupement);
        $type_epci=strtoupper($request->type_epci);
        $code_siren=strtoupper($request->code_siren);
        $civilite=strtoupper($request->civilite);
        $prenom_president=strtoupper($request->prenom_president);
        $nom_president=strtoupper($request->nom_president);
        $adresse_siege=strtoupper($request->adresse_siege);
        $code_postal=strtoupper($request->code_postal);
        $tel=strtoupper($request->tel);
        $fax=strtoupper($request->fax);
        $courriel=strtoupper($request->courriel);
        $site_internet=strtoupper($request->site_internet);
        $etat='actuel';
        $resultat_fusion=null;
        $vulnerabilite_energetique=strtoupper($request->vulnerabilite_energetique);
        $libelle_pdu=strtoupper($request->libelle_pdu);
        $etat_avancement_pdu=strtoupper($request->etat_avancement_pdu);
        $date_validation_pdu=$request->date_validation_pdu;
        $lien_doc_pdu=strtoupper($request->lien_doc_pdu);
        $libelle_plh=strtoupper($request->libelle_plh);
        $etat_avancement_plh=strtoupper($request->etat_avancement_plh);
        $date_validation_plh=$request->date_validation_plh;
        $lien_doc_plh=strtoupper($request->lien_doc_plh);
        $doc_ofpi=strtoupper($request->doc_ofpi);
        $video_epci_foncier=strtoupper($request->video_epci_foncier);



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
                'libelle_plh'=>$libelle_plh,
                'etat_avancement_plh'=>$etat_avancement_plh,
                'date_validation_plh'=>$date_validation_plh,
                'lien_doc_plh'=>$lien_doc_plh,
                'doc_ofpi'=>$doc_ofpi,
                'video_epci_foncier'=>$video_epci_foncier

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
            'nom_groupement'=>strtoupper($request->nom_groupement),
            'type_epci'=>strtoupper($request->type_epci),
            'code_siren'=>strtoupper($request->code_siren),
            'civilite'=>strtoupper($request->civilite),
            'prenom_president'=>strtoupper($request->prenom_president),
            'nom_president'=>strtoupper($request->nom_president),
            'adresse_siege'=>strtoupper($request->adresse_siege),
            'code_postal'=>strtoupper($request->code_postal),
            'tel'=>strtoupper($request->tel),
            'fax'=>strtoupper($request->fax),
            'courriel'=>strtoupper($request->courriel),
            'site_internet'=>strtoupper($request->site_internet),
            'etat'=>$request->etat,
            'resultat_fusion'=>$request->resultat_fusion,
            'vulnerabilite_energetique'=>strtoupper($request->vulnerabilite_energetique),
            'libelle_pdu'=>strtoupper($request->libelle_pdu),
            'etat_avancement_pdu'=>strtoupper($request->etat_avancement_pdu),
            'date_validation_pdu'=>strtoupper($request->date_validation_pdu),
            'lien_doc_pdu'=>strtoupper($request->lien_doc_pdu),
            'libelle_plh'=>strtoupper($request->libelle_plh),
            'etat_avancement_plh'=>strtoupper($request->etat_avancement_plh),
            'date_validation_plh'=>strtoupper($request->date_validation_plh),
            'lien_doc_plh'=>strtoupper($request->lien_doc_plh),
            'doc_ofpi'=>strtoupper($request->doc_ofpi),
            'video_epci_foncier'=>strtoupper($request->video_epci_foncier)

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
