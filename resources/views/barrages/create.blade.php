@extends('layouts.master')
@section('title')
Nouvelle donnée
@endsection
@section('subtitle')

@endsection
@section('javascript')


@section('content')
<div class="col-md-6">
	{{Form::open(['url' => '/barrage', 'method' => 'post'])}}
	<div class="panel panel-default">
		<div class="panel-heading">Général</div>
		<div class="panel-body">
		
			{{Form::label('id', 'Commmune: ')}}
			{{Form::select('id', $communes,null, ['placeholder' => 'Sélectionner une commune', 'class' => 'form-control'])}}

			{{ Form::label('nom_barrage', 'Nom barrage : ') }}
			{{ Form::text('nom_barrage','', array('class' => 'form-control')) }}

			{{ Form::label('type_barrage', 'Type barrage : ') }}
			{{ Form::text('type_barrage','', array('class' => 'form-control')) }}

			{{ Form::label('nom_gestionnaire', 'Nom gestionnaire : ') }}
			{{ Form::text('nom_gestionnaire','', array('class' => 'form-control')) }}

			{{ Form::label('type_gestionnaire', 'Type gestionnaire : ') }}
			{{ Form::text('type_gestionnaire','', array('class' => 'form-control')) }}

			{{ Form::label('annee_maj', 'Année de la mise à jour : ') }}
			{{ Form::text('annee_maj','', array('class' => 'form-control')) }}

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
