@extends('layouts.master')
@section('title')
Nouvelle donnée
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
	{{Form::open(['url' => '/logement
	', 'method' => 'post'])}}
	<div class="panel panel-default">
		<div class="panel-heading">Général</div>
		<div class="panel-body">

			{{Form::label('id', 'Commmune: ')}}
			{{Form::select('id', $communes,null, ['placeholder' => 'Sélectionner une commune', 'class' => 'form-control'])}}

			<div id="date-container" class="form-group">
				{{ Form::label('annee', 'Annee: ') }}
				{{ Form::text('annee','', array('class' => 'form-control')) }}
			</div>

						{{ Form::label('total_lgmts', 'Logements au total : ') }}
			{{ Form::text('total_lgmts','', array('class' => 'form-control')) }}

			{{ Form::label('lgmts_sociaux', 'Logements sociaux : ') }}
			{{ Form::text('lgmts_sociaux','', array('class' => 'form-control')) }}

			{{ Form::label('resid_princ', 'Résidences principales : ') }}
			{{ Form::text('resid_princ','', array('class' => 'form-control')) }}

			{{ Form::label('resid_second', 'Résidences secondaires : ') }}
			{{ Form::text('resid_second','', array('class' => 'form-control')) }}

			{{ Form::label('lgmts_vacants', 'Logements vacants : ') }}
			{{ Form::text('lgmts_vacants','', array('class' => 'form-control')) }}

			{{ Form::label('maisons', 'Maisons : ') }}
			{{ Form::text('maisons','', array('class' => 'form-control')) }}

			{{ Form::label('appartements', 'Appartements : ') }}
			{{ Form::text('appartements','', array('class' => 'form-control')) }}

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
