@extends('layouts.master')
@section('title')
nouvelle donnée
@endsection
@section('subtitle')

@endsection
@section('javascript')

$('#date-container input').datepicker({
format: "yyyy",
todayBtn: "linked",
language: "fr",
autoclose: true,
startView : 2 ,
minViewMode: 2,
maxViewMode: 2
});
@endsection

@section('content')
<div class="col-md-6">
	{{Form::open(['url' => '/logementc
	', 'method' => 'post'])}}
	<div class="panel panel-default">
		<div class="panel-heading">Général</div>
		<div class="panel-body">

			{{Form::label('id', 'Commmune : ')}}
			{{Form::select('id', $communes,null, ['placeholder' => 'Sélectionner une commune', 'class' => 'form-control'])}}

			<div id="date-container" class="form-group">
				{{ Form::label('annee', 'Année : ') }}
				{{ Form::text('annee','', array('class' => 'form-control')) }}
			</div>

			{{ Form::label('nb_indiv_pur', 'Nombre de logements individuels purs (entier) : ') }}
			{{ Form::text('nb_indiv_pur','', array('class' => 'form-control')) }}

			{{ Form::label('nb_indiv_gpes', 'Nombre de logements individuels groupés (entier) : ') }}
			{{ Form::text('nb_indiv_gpes','', array('class' => 'form-control')) }}

			{{ Form::label('nb_collectifs', 'Nombre de logements collectifs (entier) : ') }}
			{{ Form::text('nb_collectifs','', array('class' => 'form-control')) }}

			{{ Form::label('nb_residence', 'Nombre de logements en résidence  (entier) : ') }}
			{{ Form::text('nb_residence','', array('class' => 'form-control')) }}

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
