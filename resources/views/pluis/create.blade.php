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
maxViewMode: 2
});
@endsection

@section('content')
<div class="col-md-6">
	{{Form::open(['url' => '/plui
	', 'method' => 'post'])}}
	<div class="panel panel-default">
		<div class="panel-heading">Général</div>
		<div class="panel-body">

			{{Form::label('id', 'Epci : ')}}
			{{Form::select('id', $epcis,null, ['placeholder' => 'Sélectionner un epci', 'class' => 'form-control'])}}



			{{ Form::label('perimetre', 'Perimètre : ') }}
			{{ Form::text('perimetre','', array('class' => 'form-control')) }}

			{{ Form::label('type_plui', 'Type de plui : ') }}
			{{ Form::text('type_plui','', array('class' => 'form-control')) }}

			{{ Form::label('correspondant_ddt', 'Correspondant DDT : ') }}
			{{ Form::text('correspondant_ddt','', array('class' => 'form-control')) }}

			{{ Form::label('etat_avancement_demarche', 'Etat d\'avancement de la démarche : ') }}
			{{ Form::text('etat_avancement_plui','', array('class' => 'form-control')) }}

			
		</div>
	</div>


	{{Form::button('Enregistrer', ['class' => 'btn btn-default', 'type' => 'submit'])}}
	{{Form::button('Annuler', ['class' => 'btn btn-default', 'type' => 'reset'])}}
	{{Form::close()}}
</div>

<div class="col-md-12">
	<br>
<a class="btn btn-success btn-lg" href="{{ URL::previous() }}" ><i class="fa fa-arrow-circle-o-left"></i>back</a>
</div>
@endsection
