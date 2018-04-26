@extends('layouts.master')

@section('title')
Mise à jour 
@endsection

@section('content')


<div class="col-md-6">
{{Form::model($contdigba, ['method' => 'PUT', 'action' => ['Contdigbas@update',$contdigba->id]]) }}
  <div class="panel panel-default">
		<div class="panel-heading">Général</div>
		<div class="panel-body">





{{ Form::label('nom_contdigba', ' Nom contdigba : ') }}
{{ Form::text('nom_contdigba',$contdigba->nom_contdigba, array('class' => 'form-control')) }}

{{ Form::label('annee_maj', 'Année de mise à jour : ') }}
{{ Form::text('annee_maj',$contdigba->annee_maj, array('class' => 'form-control')) }}


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
