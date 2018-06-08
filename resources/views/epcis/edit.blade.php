@extends('layouts.master')

@section('title')
Mise à jour  
@endsection
@section('javascript')


$('#date-container input').datepicker({
format: "dd/mm/yyyy",
todayBtn: "linked",
language: "fr",
autoclose: true
});
$(':checkbox').checkboxpicker();
@endsection
@section('content')


<br><br>



<div class="col-md-12">
 {{Form::model($epci, ['method' => 'PUT', 'action' => ['Epcis@update',$epci->id]]) }}
 <div class="panel panel-default">
  <div class="panel-heading">Général</div>
  <div class="panel-body">

   <div class="col-md-12">

     <div class="form-group col-md-3">
      {{ Form::label('nom_epci', ' Nom epci : ') }}
      {{ Form::text('nom_groupement',$epci->nom_groupement, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-md-3">
      {{ Form::label('type', 'Type : ') }}
      {{ Form::text('type_epci',$epci->type_epci, array('class' => 'form-control')) }}
    </div>


    <div class="form-group col-md-3">
      {{ Form::label('code siren', ' Code siren : ') }}
      {{ Form::text('code_siren',$epci->code_siren, array('class' => 'form-control')) }}

    </div>


    <div class="form-group col-md-3">
      {{ Form::label('civilite', ' civilite') }}
      {{ Form::text('civilite',$epci->civilite, array('class' => 'form-control')) }}

    </div>
  </div>


  <div class="col-md-12">
    <div class="form-group col-md-3">
      {{ Form::label('prenom_president', 'Prenom president : ') }}
      {{ Form::text('prenom_president',$epci->prenom_president, array('class' => 'form-control')) }}

    </div>


    <div class="form-group col-md-3">
      {{ Form::label('nom_president', ' Nom president : ') }}
      {{ Form::text('nom_president',$epci->nom_president, array('class' => 'form-control')) }}
    </div>


    <div class="form-group col-md-3">
      {{ Form::label('adresse_siege', 'Adresse siege : ') }}
      {{ Form::text('adresse_siege',$epci->adresse_siege, array('class' => 'form-control')) }}
    </div>


    <div class="form-group col-md-3">
      {{ Form::label('code_postal', 'Code postal : ') }}
      {{ Form::text('code_postal',$epci->code_postal, array('class' => 'form-control')) }}
    </div>
  </div>

  <div class="col-md-12">

    <div class="form-group col-md-3">
      {{ Form::label('tel', ' Tel :') }}
      {{ Form::text('tel',$epci->tel, array('class' => 'form-control')) }}
    </div>



    <div class="form-group col-md-3">
      {{ Form::label('fax', ' Fax :') }}
      {{ Form::text('fax',$epci->fax, array('class' => 'form-control')) }}
    </div>


    <div class="form-group col-md-3">
      {{ Form::label('courriel', 'Courriel :') }}
      {{ Form::text('courriel',$epci->courriel, array('class' => 'form-control')) }}
    </div>


    <div class="form-group col-md-3">
      {{ Form::label('site_internet', ' Site_internet :') }}
      {{ Form::text('site_internet',$epci->site_internet, array('class' => 'form-control')) }}

    </div>
  </div>
</div>
</div>
</div>


<div class="panel panel-default ">
    <div class="panel-heading">Urbanisme/Eaux et forets </div>
    <div class="panel-body">

        <div class="form-group col-md-6">
        <b>Présence d'une DTA opposable : </b>
        <br><br>
        <input name='dta_opposable' type="checkbox" data-switch-always  data-off-label="Non" data-on-label="Oui"@if($epci->dta_opposable)checked @endif>

      </div>

      <div class="col-md-12">

        <div class="form-group col-md-6">
          {{ Form::label('aep', 'AEP : ') }}
          {{ Form::text('aep',$epci->aep, array('class' => 'form-control')) }}
        </div>
        <div class="form-group col-md-6">
          {{ Form::label('competence_concernee', 'EPCI compétente en traitement des eaux usées: ') }}
          {{ Form::text('competence_concernee',$epci->competence_concernee, array('class' => 'form-control')) }}
        </div>

        <div class="form-group col-md-12">
          {{ Form::label('carte_occup_agrico', 'Lien vers carte de l\'occupation agricole du sol et tissu urbain :') }}
          {{ Form::text('carte_occup_agrico',$epci->carte_occup_agrico, array('class' => 'form-control')) }}
        </div>

      </div>
    </div>
</div>


  <div class="panel panel-default ">
    <div class="panel-heading">Agriculture </div>
    <div class="panel-body">
      <div class="col-md-12">

        <div class="form-group col-md-12">
          {{ Form::label('recensement_agri_2010', 'Resencement agricole 2010 (lien) : ') }}
          {{ Form::text('recensement_agri_2010',$epci->recensement_agri_2010, array('class' => 'form-control')) }}
        </div>
        <div class="form-group col-md-5">
          {{ Form::label('tab_group_cult_bio', 'Tableau surface des groupes principaux de culture /pourcentage bio: ') }}
          {{ Form::text('tab_group_cult_bio',$epci->tab_group_cult_bio, array('class' => 'form-control')) }}
        </div>

        <div class="form-group col-md-5">
          {{ Form::label('carte_occup_agrico', 'Lien vers carte de l\'occupation agricole du sol et tissu urbain :') }}
          {{ Form::text('carte_occup_agrico',$epci->carte_occup_agrico, array('class' => 'form-control')) }}
        </div>
        <div class="form-group col-md-2">
          {{ Form::label('culture_decl_année', 'Année culture déclarée : ') }}
          {{ Form::text('culture_decl_année',$epci->culture_decl_année, array('class' => 'form-control')) }}
        </div>

      </div>
    </div>
</div>

    <div class="panel panel-default ">
      <div class="panel-heading">Transition énergétique et déplacements </div>
      <div class="panel-body">
        <div class="col-md-12">

          <div class="form-group col-md-4">
            {{ Form::label('vulnerabilite_energetique', 'vulnerabilite energetique : ') }}
            {{ Form::text('vulnerabilite_energetique',$epci->vulnerabilite_energetique, array('class' => 'form-control')) }}
          </div>
          <div class="form-group col-md-4">
            {{ Form::label('libelle_pdu', 'Libelle PDU : ') }}
            {{ Form::text('libelle_pdu',$epci->libelle_pdu, array('class' => 'form-control')) }}
          </div>

          <div class="form-group col-md-4">
            {{ Form::label('etat_avancement_pdu', 'Etat d\'avancement du PDU :') }}
            {{ Form::text('etat_avancement_pdu',$epci->etat_avancement_pdu, array('class' => 'form-control')) }}
          </div>

          <div class="form-group col-md-4">

           <div id="date-container" class="form-group">
            {{ Form::label('date_validation_pdu', ' Date de validation du PDU :') }}
            {{ Form::text('date_validation_pdu',$epci->date_validation_pdu, array('class' => 'form-control')) }}
          </div>

        </div>

        <div class="form-group col-md-4">
          {{ Form::label('lien_doc_pdu', ' Lien doc PDU :') }}
          {{ Form::text('lien_doc_pdu',$epci->lien_doc_pdu, array('class' => 'form-control')) }}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group col-md-6">
          {{ Form::label('nb_emploi_terri', ' Nombre d\'emplois localisés sur le territoire :') }}
          {{ Form::text('nb_emploi_terri',$epci->nb_emploi_terri, array('class' => 'form-control')) }}
        </div>
        <div class="form-group col-md-6">
          {{ Form::label('actif_res_tr_terri', ' Nombre d\'actifs ayant un emploi résidants sur le territoire  :') }}
          {{ Form::text('actif_res_tr_terri',$epci->actif_res_tr_terri, array('class' => 'form-control')) }}
        </div>
        <div class="form-group col-md-6">
          {{ Form::label('actif_res_tr_horsterri', ' Nombre d\'actifs résidents travaillant hors du territoire :') }}
          {{ Form::text('actif_res_tr_horsterri',$epci->actif_res_tr_horsterri, array('class' => 'form-control')) }}
        </div>
        <div class="form-group col-md-6">
          {{ Form::label('nb_actif_res_terri', ' Nombre d\'actifs résidents travaillant sur le territoire :') }}
          {{ Form::text('nb_actif_res_terri',$epci->nb_actif_res_terri, array('class' => 'form-control')) }}
        </div>
      </div>
    </div>

  </div>







  <div class="panel panel-default ">
    <div class="panel-heading">Logement et foncier</div>
    <div class="panel-body">

      <div class="col-md-12">
        <div class="form-group col-md-4">
          {{ Form::label('libelle_plhi', 'Libelle PLHi : ') }}
          {{ Form::text('libelle_plhi',$epci->libelle_plhi, array('class' => 'form-control')) }}
        </div>

        <div  class="form-group col-md-4" >
          {{ Form::label('etat_avancement_plhi', ' Etat avancement PLHi :') }}
          {{ Form::text('etat_avancement_plhi',$epci->etat_avancement_plhi, array('class' => 'form-control')) }}
        </div>

        <div id="date-container" class="form-group col-md-4">
          {{ Form::label('date_validation_plhi', 'Date validation PLHi :') }}
          {{ Form::text('date_validation_plhi',$epci->date_validation_plhi, array('class' => 'form-control')) }}
        </div>

        <div class="form-group col-md-4">
          {{ Form::label('lien_doc_plhi', ' Lien doc PLHi :') }}
          {{ Form::text('lien_doc_plhi',$epci->lien_doc_plhi, array('class' => 'form-control')) }}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group col-md-4">
          {{ Form::label('vulnerabilite_ener_log', 'Vulnérabilité énergétique au logement : ') }}
          {{ Form::text('vulnerabilite_ener_log',$epci->vulnerabilite_ener_log, array('class' => 'form-control')) }}
        </div>

        <div  class="form-group col-md-4" >
          {{ Form::label('coproprio_deg_frag', ' Copropriétés dégradées ou fragiles :') }}
          {{ Form::text('coproprio_deg_frag',$epci->coproprio_deg_frag, array('class' => 'form-control')) }}
        </div>

        <div  class="form-group col-md-4">
          {{ Form::label('nb_quart_prio', 'Nombre de quartier prioritaire :') }}
          {{ Form::text('nb_quart_prio',$epci->nb_quart_prio, array('class' => 'form-control')) }}
        </div>

        <div class="form-group col-md-4">
          {{ Form::label('nb_hab_quart_prio', ' Nombre d\'habitants résidants dans des quartiers prioritaires (Nombre+Année) :') }}
          {{ Form::text('nb_hab_quart_prio',$epci->nb_hab_quart_prio, array('class' => 'form-control')) }}
        </div>
      </div>


      <div class="col-md-12">
        <div class="form-group col-md-6">
          {{ Form::label('doc_ofpi', ' Doc ofpi :') }}
          {{ Form::text('doc_ofpi',$epci->doc_ofpi, array('class' => 'form-control')) }}
        </div>

        <div class="form-group col-md-6">
          {{ Form::label('video_epci_foncier', 'Video epci foncier :') }}
          {{ Form::text('video_epci_foncier',$epci->video_epci_foncier, array('class' => 'form-control')) }}
        </div>
      </div>



    </div>
  </div>
</div>
<div class="col-md-12">
  
{{Form::button('Mettre à jour', ['class' => 'btn btn-default', 'type' => 'submit'])}}
{{Form::button('Annuler', ['class' => 'btn btn-default', 'type' => 'reset'])}}
{{Form::close()}}
</div>

<div class="col-md-12">
  <br>
<a class="btn btn-success btn-lg" href="{{ URL::previous() }}" ><i class="fa fa-arrow-circle-o-left"></i>back</a>
</div>

@endsection

