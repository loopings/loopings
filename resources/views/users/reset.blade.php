@extends('layouts.master')

@section('title')
Réinitialisation d'un mot de passe
@endsection

@section('content')



<div class="col-md-6">
{{Form::model($userreset, ['method' => 'PUT', 'action' => ['Users@reset',$userreset->id]]) }}
  <div class="panel panel-default">
    <div class="panel-heading">Veuillez entrer un nouveau mot de passe pour {{ $userreset->email }}</div>
    <div class="panel-body">




{{ Form::label('pass1', 'Nouveau mot de passe : ') }}

{{ Form::password('pass1', array('class' => 'form-control')) }}


{{ Form::label('pass2', 'Confirmer le nouveau mot de passe : ') }}

{{ Form::password('pass2', array('class' => 'form-control')) }}
 </div>
  </div>


{{Form::button('Réinitialiser', ['class' => 'btn btn-default', 'type' => 'submit'])}}
{{Form::button('Annuler', ['class' => 'btn btn-default', 'type' => 'reset'])}}
{{Form::close()}}
</div>

<div class="col-md-12">
	<br>
<a class="btn btn-success btn-lg" href="{{ URL::previous() }}" ><i class="fa fa-arrow-circle-o-left"></i>&nbsp;Retour</a>
</div>
@endsection

