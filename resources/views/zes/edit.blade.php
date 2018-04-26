@extends('layouts.master')

@section('title')
Mise à jour 
@endsection

@section('content')


<div class="col-md-6">
{{Form::model($ze, ['method' => 'PUT', 'action' => ['Zes@update',$ze->id]]) }}
		<div class="panel-heading">Général</div>
		<div class="panel-body">


{{ Form::label('libelle_ze', ' Libelle de la zone : ') }}
{{ Form::text('libelle_ze',$ze->libelle_ze, array('class' => 'form-control')) }}

{{ Form::label('annee_maj', 'Année de mise à jour de la donnée : ') }}
{{ Form::text('annee_maj',$ze->annee_maj, array('class' => 'form-control')) }}


<br><br>
{{     Form::submit('mettre à jour', array('class' => 'btn btn-primary'))   }}
{{ Form::close() }}




<div class="col-md-12">
	<br>
<a class="btn btn-success btn-lg" href="{{ URL::previous() }}" ><i class="fa fa-arrow-circle-o-left"></i>back</a>
</div>
@endsection
