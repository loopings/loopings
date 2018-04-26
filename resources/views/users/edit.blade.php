@extends('layouts.master')

@section('title')
Mise à jour 
@endsection

@section('content')



<div class="col-md-6">
{{Form::model($agent_car, ['method' => 'PUT', 'action' => ['Agent_cars@update',$agent_car->id]]) }}
  <div class="panel panel-default">
    <div class="panel-heading">Général</div>
    <div class="panel-body">




{{ Form::label('nom', 'nom agent : ') }}

{{ Form::text('nom_car',$agent_car->nom_car, array('class' => 'form-control')) }}


{{ Form::label('prenom', 'prenom agent : ') }}

{{ Form::text('prenom_car',$agent_car->prenom_car, array('class' => 'form-control')) }}


{{ Form::label('categorie', 'categorie zonage : ') }}

{{ Form::text('zonage_car',$agent_car->zonage_car, array('class' => 'form-control')) }}
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

