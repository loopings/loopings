@extends('layouts.master')

@section('title')
Mise à jour 
@endsection

@section('content')



<div class="col-md-6">
	{{Form::model($logementc, ['method' => 'PUT', 'action' => ['Logementcs@update',$logementc->id]]) }}
	<div class="panel panel-default">
		<div class="panel-heading">Général</div>
		<div class="panel-body">

			{{ Form::label('nb_indiv_pur', 'Nombre de logements individuels purs (entier) : ') }}
			{{ Form::text('nb_indiv_pur',$logementc->nb_indiv_pur, array('class' => 'form-control')) }}

			{{ Form::label('nb_indiv_gpes', 'Nombre de logements individuels groupés (entier) : ') }}
			{{ Form::text('nb_indiv_gpes',$logementc->nb_indiv_gpes, array('class' => 'form-control')) }}

			{{ Form::label('nb_collectifs', 'Nombre de logements collectifs (entier) : ') }}
			{{ Form::text('nb_collectifs',$logementc->nb_collectifs, array('class' => 'form-control')) }}

			{{ Form::label('nb_residence', 'Nombre de logements en résidence  (entier) : ') }}
			{{ Form::text('nb_residence',$logementc->nb_residence, array('class' => 'form-control')) }}





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
