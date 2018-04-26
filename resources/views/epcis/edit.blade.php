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


<div class="col-md-12">
  <div class="panel panel-default ">
    <div class="panel-heading">Données Urbanisme et foncier</div>
    <div class="panel-body">

      <div class="col-md-12">

        <div class="form-group col-md-4">
          {{ Form::label('vulnerabilite_energetique', 'vulnerabilite energetique : ') }}
          {{ Form::text('vulnerabilite_energetique',$epci->vulnerabilite_energetique, array('class' => 'form-control')) }}
        </div>


        <div class="form-group col-md-4">
          {{ Form::label('libelle_pdu', 'Libelle pdu : ') }}
          {{ Form::text('libelle_pdu',$epci->libelle_pdu, array('class' => 'form-control')) }}
        </div>


        <div class="form-group col-md-4">
          {{ Form::label('etat_avancement_pdu', 'Etat avancement du pdu :') }}
          {{ Form::text('etat_avancement_pdu',$epci->etat_avancement_pdu, array('class' => 'form-control')) }}
        </div>


        <div id="date-container" class="form-group col-md-4">
          
            {{ Form::label('date_validation_pdu', ' Date validation pdu :') }}
            {{ Form::text('date_validation_pdu', date("d/m/Y",strtotime($epci->date_validation_pdu)), array('class' => 'form-control')) }}
       
        </div>


        <div class="form-group col-md-4">
          {{ Form::label('lien_doc_pdu', ' Lien doc pdu :') }}
          {{ Form::text('lien_doc_pdu',$epci->lien_doc_pdu, array('class' => 'form-control')) }}
        </div>
      </div>


      <div class="col-md-12">
      <div class="form-group col-md-4">
          {{ Form::label('libelle_plh', 'Libelle plh : ') }}
          {{ Form::text('libelle_plh',$epci->libelle_plh, array('class' => 'form-control')) }}
        </div>


        <div class="form-group col-md-4">
          {{ Form::label('etat_avancement_plh', ' Etat avancement plh :') }}
          {{ Form::text('etat_avancement_plh',$epci->etat_avancement_plh, array('class' => 'form-control')) }}
        </div>


        <div id="date-container" class="form-group col-md-4">
          {{ Form::label('date_validation plh', 'Date validation plh :') }}
          {{ Form::text('date_validation_plh',$epci->date_validation_plh, array('class' => 'form-control')) }}
        </div>


        <div class="form-group col-md-4">
          {{ Form::label('lien_doc_plh', ' Lien doc plh :') }}
          {{ Form::text('lien_doc_plh',$epci->lien_doc_plh, array('class' => 'form-control')) }}

        </div>

      </div>



<div class="col-md-12">
      <div class="form-group col-md-6">
        {{ Form::label('doc_ofpi', ' Doc ofpi :') }}
        {{ Form::text('doc_ofpi',$epci->doc_ofpi, array('class' => 'form-control')) }}

      </div>


      <div class="form-group col-md-6">
        {{ Form::label('video epci foncier', 'Video epci foncier :') }}
        {{ Form::text('video_epci_foncier',$epci->video_epci_foncier, array('class' => 'form-control')) }}
      </div>

</div>

<div class="col-md-12">
      <div class="form-group col-md-6">


         {{Form::label('etat', 'EPCI actuel ou fusionné ? : ')}}
          {{Form::select('etat', ['actuel'=>'actuel','fusionné'=>'fusionné'] ,null, ['placeholder' => 'Sélectionner ', 'class' => 'form-control'])}}
      </div>


      <div class="form-group col-md-6">
         {{Form::label('resultat_fusion', 'EPCI résultant si fusion: ')}}
          {{Form::select('resultat_fusion', $epcis,null, ['placeholder' => 'Sélectionner un EPCI ', 'class' => 'form-control'])}}


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

