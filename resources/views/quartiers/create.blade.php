@extends('layouts.master')
@section('title')
Nouvelle donnée
@endsection
@section('subtitle')

@endsection
@section('javascript')


@section('content')
<div class="col-md-6">
	{{Form::open(['url' => '/quartier', 'method' => 'post'])}}
	<div class="panel panel-default">
		<div class="panel-heading">Général</div>
		<div class="panel-body">

			{{Form::label('id', 'Commmune : ')}}
			{{Form::select('id', $communes,null, ['placeholder' => 'Sélectionner une commune', 'class' => 'form-control'])}}


			{{ Form::label('nom_quartier', 'Nom quartier: ') }}
			{{ Form::text('nom_quartier','', array('class' => 'form-control')) }}

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
