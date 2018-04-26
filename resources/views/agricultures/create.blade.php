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
	{{Form::open(['url' => '/agriculture
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

			{{ Form::label('exploit', 'Nombre d’exploitations agricoles : ') }}
			{{ Form::text('exploit','', array('class' => 'form-control')) }}

			{{ Form::label('unitravail', 'Nombre d’unités de travail annuel : ') }}
			{{ Form::text('unitravail','', array('class' => 'form-control')) }}

			{{ Form::label('sau_ha', 'Surface Agricole Utile en hectares : ') }}
			{{ Form::text('sau_ha','', array('class' => 'form-control')) }}

			{{ Form::label('cheptel', 'Taille du cheptel : ') }}
			{{ Form::text('cheptel','', array('class' => 'form-control')) }}

			{{ Form::label('orientecheco', 'Orientation technico-économique : ') }}
			{{ Form::text('orientecheco','', array('class' => 'form-control')) }}

			{{ Form::label('surflabour_ha', 'Surfaces labourables en hectares : ') }}
			{{ Form::text('surflabour_ha','', array('class' => 'form-control')) }}

			{{ Form::label('surfcultperm_ha', 'Surfaces de cultures permanentes en hectares : ') }}
			{{ Form::text('surfcultperm_ha','', array('class' => 'form-control')) }}

			{{ Form::label('surfherbe_ha', 'Surfaces en herbes en hectares : ') }}
			{{ Form::text('surfherbe_ha','', array('class' => 'form-control')) }}

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
