@extends('layouts.master')
@section('title')
nouvelle zone
@endsection
@section('subtitle')

@endsection
@section('javascript')

@endsection
@section('content')
<div class="col-md-6">
  {{Form::open(['url' => '/natura2000', 'method' => 'post'])}}
  <div class="panel panel-default">
    <div class="panel-heading">Général</div>
    <div class="panel-body">

{{ Form::label('nom_natura2000', ' nom natura2000 : ') }}
{{ Form::text('nom_natura2000','', array('class' => 'form-control')) }}


{{ Form::label('departements', 'Départements sur lesquels s’étend la zone Natura: ') }}
{{ Form::text('departements','', array('class' => 'form-control')) }}

{{ Form::label('annee_maj', 'Année de mise à jour de la donnée : ') }}
{{ Form::text('annee_maj','', array('class' => 'form-control')) }}
    </div>
  </div>


{{Form::button('Enregistrer', ['class' => 'btn btn-default', 'type' => 'submit'])}}
{{Form::button('Annuler', ['class' => 'btn btn-default', 'type' => 'reset'])}}
{{Form::close()}}

<div class="col-md-12">
	<br>
<a class="btn btn-success btn-lg" href="{{ URL::previous() }}" ><i class="fa fa-arrow-circle-o-left"></i>back</a>
</div>
</div>
@endsection
