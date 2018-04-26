@extends('layouts.master')
@section('title')
Nouvel EPCI
@endsection
@section('subtitle')

@endsection
@section('javascript')
    $('#date-container input').datepicker({
      format: "dd/mm/yyyy",
      todayBtn: "linked",
      language: "fr",
      autoclose: true
    });
@endsection
@section('content')
<div class="col-md-12">
  {{Form::open(['url' => '/epci', 'method' => 'post'])}}
  <div class="panel panel-default">
    <div class="panel-heading">Général</div>
    <div class="panel-body">

      <div class="col-md-12">
        <div class="form-group col-md-3">
          {{Form::label('nom_groupement', 'Nom du groupement')}}
          {{Form::text('nom_groupement', '',  ['class' => 'form-control'])}}
        </div>

        <div class="form-group col-md-3">
          {{ Form::label('type', 'Type : ') }}
          {{ Form::text('type_epci','', array('class' => 'form-control')) }}
        </div>


        <div class="form-group col-md-3">
          {{ Form::label('code siren', ' Code siren : ') }}
          {{ Form::text('code_siren','', array('class' => 'form-control')) }}
        </div>

        <div class="form-group col-md-3">
          {{ Form::label('civilite', ' Civilite :') }}
          {{ Form::text('civilite','', array('class' => 'form-control')) }}
        </div>

      </div>

      <div class="col-md-12">
        <div class="form-group col-md-3">
          {{ Form::label('prenom_president', 'Prenom president : ') }}
          {{ Form::text('prenom_president','', array('class' => 'form-control')) }}
        </div>

        <div class="form-group col-md-3">
          {{ Form::label('nom_president', ' Nom president : ') }}
          {{ Form::text('nom_president','', array('class' => 'form-control')) }}
        </div>

        <div class="form-group col-md-3">
          {{ Form::label('adresse_siege', 'Adresse siege : ') }}
          {{ Form::text('adresse_siege','', array('class' => 'form-control')) }}
        </div>

        <div class="form-group col-md-3">
          {{ Form::label('code_postal', 'Code postal : ') }}
          {{ Form::text('code_postal','', array('class' => 'form-control')) }}
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group col-md-3">
          {{ Form::label('tel', ' Tel :') }}
          {{ Form::text('tel','', array('class' => 'form-control')) }}
        </div>

        <div class="form-group col-md-3">
          {{ Form::label('fax', ' Fax :') }}
          {{ Form::text('fax','', array('class' => 'form-control')) }}
        </div>

        <div class="form-group col-md-3">
          {{ Form::label('courriel', 'Courriel :') }}
          {{ Form::text('courriel','', array('class' => 'form-control')) }}
        </div>

        <div class="form-group col-md-3">
          {{ Form::label('site_internet', ' Site internet :') }}
          {{ Form::text('site_internet','', array('class' => 'form-control')) }}
        </div>
      </div>

    </div>
  </div>
</div>
<div class="col-md-12">
  <div class="panel panel-default ">
    <div class="panel-heading">Données Urbanisme et foncier</div>
    <div class="panel-body">
      <div class="col-md-12">

        <div class="form-group col-md-4">
          {{ Form::label('vulnerabilite_energetique', 'vulnerabilite energetique : ') }}
          {{ Form::text('vulnerabilite_energetique','', array('class' => 'form-control')) }}
        </div>
        <div class="form-group col-md-4">
          {{ Form::label('libelle_pdu', 'Libelle PDU : ') }}
          {{ Form::text('libelle_pdu','', array('class' => 'form-control')) }}
        </div>

        <div class="form-group col-md-4">
          {{ Form::label('etat_avancement_pdu', 'Etat d\'avancement du PDU :') }}
          {{ Form::text('etat_avancement_pdu','', array('class' => 'form-control')) }}
        </div>

        <div class="form-group col-md-4">

         <div id="date-container" class="form-group">
          {{ Form::label('date_validation_pdu', ' Date de validation du PDU :') }}
          {{ Form::text('date_validation_pdu','', array('class' => 'form-control')) }}
        </div>

      </div>

      <div class="form-group col-md-4">
        {{ Form::label('lien_doc_pdu', ' Lien doc PDU :') }}
        {{ Form::text('lien_doc_pdu','', array('class' => 'form-control')) }}
      </div>

    </div>

    <div class="col-md-12">
      <div class="form-group col-md-4">
        {{ Form::label('libelle_plh', 'Libelle PLH : ') }}
        {{ Form::text('libelle_plh','', array('class' => 'form-control')) }}
      </div>

      <div  class="form-group col-md-4" >
        {{ Form::label('etat_avancement_plh', ' Etat avancement PLH :') }}
        {{ Form::text('etat_avancement_plh','', array('class' => 'form-control')) }}
      </div>

      <div id="date-container" class="form-group col-md-4">
        {{ Form::label('date_validation plh', 'Date validation PLH :') }}
        {{ Form::text('date_validation_plh','', array('class' => 'form-control')) }}
      </div>

      <div class="form-group col-md-4">
        {{ Form::label('lien_doc_plh', ' Lien doc PLH :') }}
        {{ Form::text('lien_doc_plh','', array('class' => 'form-control')) }}
      </div>
    </div>


    <div class="col-md-12">
    <div class="form-group col-md-6">
        {{ Form::label('doc_ofpi', ' Doc ofpi :') }}
        {{ Form::text('doc_ofpi','', array('class' => 'form-control')) }}
      </div>

      <div class="form-group col-md-6">
        {{ Form::label('video epci foncier', 'Video epci foncier :') }}
        {{ Form::text('video_epci_foncier','', array('class' => 'form-control')) }}
      </div>
    </div>


  </div>
</div>
</div>
{{Form::button('Enregistrer', ['class' => 'btn btn-default', 'type' => 'submit'])}}
{{Form::button('Annuler', ['class' => 'btn btn-default', 'type' => 'reset'])}}
{{Form::close()}}

<div class="col-md-12">
  <br>
<a class="btn btn-success btn-lg" href="{{ URL::previous() }}" ><i class="fa fa-arrow-circle-o-left"></i>back</a>
</div>
@endsection
