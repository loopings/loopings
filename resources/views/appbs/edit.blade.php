@extends('layouts.master')

@section('title')
Mise à jour 
@endsection

@section('content')


<div class="col-md-6">
 {{Form::model($appb, ['method' => 'PUT', 'action' => ['Appbs@update',$appb->id]]) }}
  <div class="panel panel-default">
    <div class="panel-heading">Général</div>
    <div class="panel-body">




{{ Form::label('nom_appb', ' Nom appb :') }}
{{ Form::text('nom_appb',$appb->nom_appb, array('class' => 'form-control')) }}

{{ Form::label('etat_appb', 'Etat APPB :') }}
{{ Form::text('etat_appb',$appb->etat_appb, array('class' => 'form-control')) }}

{{ Form::label('annee_maj', 'Annee mise à jour :') }}
{{ Form::text('annee_maj',$appb->annee_maj, array('class' => 'form-control')) }}




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