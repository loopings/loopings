@extends('layouts.master')
@section('title')
Nouvelle digue
@endsection
@section('subtitle')

@endsection
@section('javascript')

@endsection
@section('content')
<div class="col-md-6">
  {{Form::open(['url' => '/digue', 'method' => 'post'])}}
  <div class="panel panel-default">
    <div class="panel-heading">Général</div>
    <div class="panel-body">


{{ Form::label('nom_bassinversant', ' Nom du bassin versant dans lequel est installée la 
digue: ') }}
{{ Form::text('nom_bassinversant','', array('class' => 'form-control')) }}

{{ Form::label('nom_riviere', ' Nom de la rivière sur laquelle est installée la digue: ') }}
{{ Form::text('nom_riviere','', array('class' => 'form-control')) }}


{{ Form::label('rive_protegee', ' Rive protégée par la digue: ') }}
{{ Form::text('rive_protegee','', array('class' => 'form-control')) }}

{{ Form::label('nom_gestionnaire', ' Nom du gestionnaire de la digue: ') }}
{{ Form::text('nom_gestionnaire','', array('class' => 'form-control')) }}

{{ Form::label('type_gestionnaire', ' Type du gestionnaire de la digue: ') }}
{{ Form::text('type_gestionnaire','', array('class' => 'form-control')) }}

{{ Form::label('proprietaire', ' Propriétaire de la digue: ') }}
{{ Form::text('proprietaire','', array('class' => 'form-control')) }}

{{ Form::label('type_proprietaire', 'Type du propriétaire de la digue: ') }}
{{ Form::text('type_proprietaire','', array('class' => 'form-control')) }}

{{ Form::label('annee_maj', 'Année de mise à jour de la donnée: ') }}
{{ Form::text('annee_maj','', array('class' => 'form-control')) }}


    </div>
  </div>


{{Form::button('Enregistrer', ['class' => 'btn btn-default', 'type' => 'submit'])}}
{{Form::button('Annuler', ['class' => 'btn btn-default', 'type' => 'reset'])}}
{{Form::close()}}

<div class="col-md-12">
	<br>
<a class="btn btn-success btn-lg" href="{{ URL::previous() }}" ><i class="fa fa-arrow-circle-o-left"></i>back</a>
</div>
</div>
@endsection
