@extends('layouts.master')
@section('title')
nouvelle installation
@endsection
@section('subtitle')

@endsection
@section('javascript')

@endsection
@section('content')
<div class="col-md-6">
  {{Form::open(['url' => '/icpe', 'method' => 'post'])}}
  <div class="panel panel-default">
    <div class="panel-heading">Général</div>
    <div class="panel-body">

{{ Form::label('ents_proprietaire', ' Nom de l’entreprise propriétaire de l’installation : ') }}
{{ Form::text('ents_proprietaire','', array('class' => 'form-control')) }}

{{ Form::label('activite', 'Activité de l’installation: ') }}
{{ Form::text('activite','', array('class' => 'form-control')) }}

{{ Form::label('classement', 'Classement du risque de l’installation : ') }}
{{ Form::text('classement','', array('class' => 'form-control')) }}

{{ Form::label('annee_maj', 'Année de mise à jour: ') }}
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
