@extends('layouts.master')

@section('title')
Mise à jour 
@endsection

@section('content')


<br><br>



<div class="col-md-6">
	{{Form::model($scot, ['method' => 'PUT', 'action' => ['Scots@update',$scot->id]]) }}

	<div class="panel panel-default">
		<div class="panel-heading">Général</div>
		<div class="panel-body">

			{{ Form::label('nom', 'Nom scot : ') }}
			{{ Form::text('nom_scot',$scot->nom_scot, array('class' => 'form-control')) }}

			{{ Form::label('rapport_presentation', ' Rapport de présentation : ') }}
			{{ Form::text('rapport_presentation',$scot->rapport_presentation, array('class' => 'form-control')) }}

			{{ Form::label('padd', 'PADD : ') }}
			{{ Form::text('padd',$scot->padd, array('class' => 'form-control')) }}

			{{ Form::label('doo', 'DOO : ') }}
			{{ Form::text('doo',$scot->doo, array('class' => 'form-control')) }}

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
