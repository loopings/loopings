@extends('layouts.master')
@section('title')
nouveau troncon
@endsection
@section('subtitle')

@endsection
@section('javascript')

@endsection
@section('content')
<div class="col-md-6">
  {{Form::open(['url' => '/troncons', 'method' => 'post'])}}
  <div class="panel panel-default">
    <div class="panel-heading">Général</div>
    <div class="panel-body">


{{Form::label('id_comm', 'Commune : ')}}
{{Form::select('id_comm', $comms,null, ['placeholder' => 'Sélectionner une commune', 'class' => 'form-control'])}}


{{ Form::label('type', 'Type troncon (fer ou rte) : ') }}
{{ Form::text('type','', array('class' => 'form-control')) }}

{{ Form::label('categorie_nuisonore', 'Categorie nuisance sonore : ') }}
{{ Form::text('categorie_nuisonore','', array('class' => 'form-control')) }}

{{ Form::label('nom_numero_voie', 'Nom ou numéro de voie : ') }}
{{ Form::text('nom_numero_voie','', array('class' => 'form-control')) }}

{{ Form::label('annee_maj', 'Année de la donnée : ') }}
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
