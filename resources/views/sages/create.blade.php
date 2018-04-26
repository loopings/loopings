@extends('layouts.master')
@section('title')
Nouveau sage
@endsection
@section('subtitle')

@endsection
@section('javascript')

@endsection
@section('content')
<div class="col-md-6">
  {{Form::open(['url' => '/sage', 'method' => 'post'])}}
  <div class="panel panel-default">
    <div class="panel-heading">Général</div>
    <div class="panel-body">

{{ Form::label('nom_sage', ' Nom sage : ') }}
{{ Form::text('nom_sage','', array('class' => 'form-control')) }}

{{ Form::label('lien_gesteau', 'Adresse internet de la fiche descriptive du SAGE : ') }}
{{ Form::text('lien_gesteau','', array('class' => 'form-control')) }}

{{ Form::label('contact1', 'Contact 1 : ') }}
{{ Form::text('contact1','', array('class' => 'form-control')) }}

{{ Form::label('contact2', 'Contact 2 : ') }}
{{ Form::text('contact2','', array('class' => 'form-control')) }}

{{ Form::label('annee_maj', 'Année de  mise à jour de la donnée : ') }}
{{ Form::text('annee_maj','', array('class' => 'form-control')) }}

    </div>
  </div>


{{Form::button('Enregistrer', ['class' => 'btn btn-default', 'type' => 'submit'])}}
{{Form::button('Annuler', ['class' => 'btn btn-default', 'type' => 'reset'])}}
{{Form::close()}}
</div>

<div class="col-md-12">
	<br>
<a class="btn btn-success btn-lg" href="{{ URL::previous() }}" ><i class="fa fa-arrow-circle-o-left"></i>back</a>
</div>
@endsection
