@extends('layouts.master')

@section('title')
Mise à jour 
@endsection

@section('content')


<div class="col-md-6">
{{Form::model($au, ['method' => 'PUT', 'action' => ['Aus@update',$au->id]]) }}
		<div class="panel panel-default">
		<div class="panel-heading">Général</div>
		<div class="panel-body">



{{ Form::label('typologie', ' Typologie : ') }}
{{ Form::text('typologie',$au->typologie, array('class' => 'form-control')) }}




{{ Form::label('libelle_ville_centre', 'Libellé de la ville centre : ') }}
{{ Form::text('libelle_ville_centre',$au->libelle_ville_centre, array('class' => 'form-control')) }}

{{ Form::label('annee_maj', 'Année mise à jour de la donnée : ') }}
{{ Form::text('annee_maj',$au->annee_maj, array('class' => 'form-control')) }}


</div>
	</div>


	{{Form::button('Mettre à jour', ['class' => 'btn btn-default', 'type' => 'submit'])}}
	{{Form::button('Annuler', ['class' => 'btn btn-default', 'type' => 'reset'])}}
	{{Form::close()}}
</div>



<div class="col-md-12">
	<br>
<a class="btn btn-success btn-lg" href="{{ URL::previous() }}" ><i class="fa fa-arrow-circle-o-left"></i>back</a>
</div>

@endsection
