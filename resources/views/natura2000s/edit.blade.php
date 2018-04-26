@extends('layouts.master')

@section('title')
Mise à jour 
@endsection

@section('content')

<div class="col-md-6">
	{{Form::model($natura2000, ['method' => 'PUT', 'action' => ['Natura2000s@update',$natura2000->id]]) }}

	<div class="panel panel-default">
		<div class="panel-heading">Général</div>
		<div class="panel-body">



			{{ Form::label('nom_natura2000', ' nom natura2000 : ') }}
			{{ Form::text('nom_natura2000',$natura2000->nom_natura2000, array('class' => 'form-control')) }}

			{{ Form::label('departements', 'Départements sur lesquels s’étend la zone Natura : ') }}
			{{ Form::text('departements',$natura2000->departements, array('class' => 'form-control')) }}

			{{ Form::label('annee_maj', 'Année de mise à jour : ') }}
			{{ Form::text('annee_maj',$natura2000->annee_maj, array('class' => 'form-control')) }}


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
