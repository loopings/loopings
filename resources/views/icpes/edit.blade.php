@extends('layouts.master')

@section('title')
Mise à jour 
@endsection

@section('content')



<div class="col-md-6">
{{Form::model($icpe, ['method' => 'PUT', 'action' => ['Icpes@update',$icpe->id]]) }}

		<div class="panel-heading">Général</div>
		<div class="panel-body">

{{ Form::label('ents_proprietaire', ' Nom de l’entreprise propriétaire de l’installation : ') }}
{{ Form::text('ents_proprietaire',$icpe->ents_proprietaire, array('class' => 'form-control')) }}

{{ Form::label('activite', 'Activité de l’installation: ') }}
{{ Form::text('activite',$icpe->activite, array('class' => 'form-control')) }}

{{ Form::label('classement', 'Classement du risque de l’installation : ') }}
{{ Form::text('classement',$icpe->classement, array('class' => 'form-control')) }}

{{ Form::label('annee_maj', 'Année de mise à jour: ') }}
{{ Form::text('annee_maj',$icpe->annee_maj, array('class' => 'form-control')) }}


<br><br>
{{     Form::submit('mettre à jour', array('class' => 'btn btn-primary'))   }}
{{ Form::close() }}



<div class="col-md-12">
	<br>
<a class="btn btn-success btn-lg" href="{{ URL::previous() }}" ><i class="fa fa-arrow-circle-o-left"></i>back</a>
</div>


@endsection
