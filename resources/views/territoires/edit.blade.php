@extends('layouts.master')

@section('title')
Mise à jour 
@endsection

@section('content')


<br><br>



<div class="col-md-6">
{{Form::model($territoire, ['method' => 'PUT', 'action' => ['Territoires@update',$territoire->id]]) }}
  <div class="panel panel-default">
    <div class="panel-heading">Général</div>
    <div class="panel-body">

{{ Form::label('nom', 'Nom territoire 38 : ') }}

{{ Form::text('nom_terri38',$territoire->nom_terri38, array('class' => 'form-control')) }}

 
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
