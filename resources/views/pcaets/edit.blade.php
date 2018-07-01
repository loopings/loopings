@extends('layouts.master')

@section('title')
Mise à jour 
@endsection

@section('content')



<div class="col-md-6">
	{{Form::model($pcaet, ['method' => 'PUT', 'action' => ['Pcaets@update',$pcaet->id_epci]]) }}
	<div class="panel panel-default">
		<div class="panel-heading">Général</div>
		<div class="panel-body">

			{{ Form::label('nom_pcaet', 'Nom PCAET : ') }}
			{{ Form::text('nom_pcaet',$pcaet->nom_pcaet, array('class' => 'form-control')) }}

			{{ Form::label('correspondant_ddt', 'Correspondant DDT : ') }}
			{{ Form::text('correspondant_ddt',$pcaet->correspondant_ddt, array('class' => 'form-control')) }}

			{{ Form::label('correspondant2_ddt', 'Autre correspondant DDT : ') }}
			{{ Form::text('correspondant2_ddt',$pcaet->correspondant2_ddt, array('class' => 'form-control')) }}

			{{ Form::label('type_pcaet', 'Type de pcaet : ') }}
			{{ Form::text('type_pcaet',$pcaet->type_pcaet, array('class' => 'form-control')) }}

			{{ Form::label('etat_avancement_demarche', 'Etat d\'avancement de la démarche : ') }}
			{{ Form::text('etat_avancement_demarche',$pcaet->etat_avancement_demarche, array('class' => 'form-control')) }}

			{{ Form::label('annee_maj', 'Année de mise à jour de la donnée : ') }}
			{{ Form::text('annee_maj',$pcaet->annee_maj, array('class' => 'form-control')) }}

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
