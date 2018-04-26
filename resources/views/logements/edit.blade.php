@extends('layouts.master')

@section('title')
Mise à jour 
@endsection

@section('content')



<div class="col-md-6">
	{{Form::model($logement, ['method' => 'PUT', 'action' => ['Logements@update',$logement->id]]) }}
	<div class="panel panel-default">
		<div class="panel-heading">Général</div>
		<div class="panel-body">

			{{ Form::label('total_lgmts', 'Logements au total (entier) : ') }}
			{{ Form::text('total_lgmts',$logement->total_lgmts, array('class' => 'form-control')) }}

			{{ Form::label('lgmts_sociaux', 'Logements sociaux  (entier) : ') }}
			{{ Form::text('lgmts_sociaux',$logement->lgmts_sociaux, array('class' => 'form-control')) }}

			{{ Form::label('resid_princ', 'Résidences principales  (entier) : ') }}
			{{ Form::text('resid_princ',$logement->resid_princ, array('class' => 'form-control')) }}

			{{ Form::label('resid_second', 'Résidences secondaires  (entier) : ') }}
			{{ Form::text('resid_second',$logement->resid_second, array('class' => 'form-control')) }}

			{{ Form::label('lgmts_vacants', 'Logements vacants  (entier) : ') }}
			{{ Form::text('lgmts_vacants',$logement->lgmts_vacants, array('class' => 'form-control')) }}

			{{ Form::label('maisons', 'Maisons  (entier) : ') }}
			{{ Form::text('maisons',$logement->maisons, array('class' => 'form-control')) }}

			{{ Form::label('appartements', 'Appartements (entier) : ') }}
			{{ Form::text('appartements',$logement->appartements, array('class' => 'form-control')) }}

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
