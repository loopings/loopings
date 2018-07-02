@extends('layouts.master')

@section('title')
Mise à jour 
@endsection

@section('content')


<div class="col-md-6">
{{Form::model($aocaop, ['method' => 'PUT', 'action' => ['Aocaops@update',$aocaop->id]]) }}
  <div class="panel panel-default">
		<div class="panel-heading">Général</div>
		<div class="panel-body">





{{ Form::label('nom_aocaop', ' Libellé : ') }}
{{ Form::text('nom_aocaop',$aocaop->nom_aocaop, array('class' => 'form-control')) }}

{{ Form::label('annee_maj', 'Année de mise à jour : ') }}
{{ Form::text('annee_maj',$aocaop->annee_maj, array('class' => 'form-control')) }}


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
