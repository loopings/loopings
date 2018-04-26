@extends('layouts.master')

@section('title')
Mise à jour 
@endsection

@section('content')


<div class="col-md-6">
{{Form::model($captage, ['method' => 'PUT', 'action' => ['Captages@update',$captage->id]]) }}
  <div class="panel panel-default">
		<div class="panel-heading">Général</div>
		<div class="panel-body">



{{ Form::label('nom_captage', ' Nom captage : ') }}
{{ Form::text('nom_captage',$captage->nom_captage, array('class' => 'form-control')) }}

{{ Form::label('service', ' Service : ') }}
{{ Form::text('service',$captage->service, array('class' => 'form-control')) }}

{{ Form::label('dup', ' DUP : ') }}
{{ Form::text('dup',$captage->dup, array('class' => 'form-control')) }}

{{ Form::label('annee_maj', 'Année de mise à jour : ') }}
{{ Form::text('annee_maj',$captage->annee_maj, array('class' => 'form-control')) }}


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
