@extends('layouts.master')
@section('title')
Nouvelle unité
@endsection
@section('subtitle')

@endsection
@section('javascript')

@endsection
@section('content')
<div class="col-md-6">
  {{Form::open(['url' => '/uu', 'method' => 'post'])}}
  <div class="panel panel-default">
    <div class="panel-heading">Général</div>
    <div class="panel-body">

{{ Form::label('libelle_uu', ' Libellé unité urbaine  : ') }}
{{ Form::text('libelle_uu','', array('class' => 'form-control')) }}

{{ Form::label('population', 'Population  : ') }}
{{ Form::text('population','', array('class' => 'form-control')) }}


{{ Form::label('code_geographique', 'Code géographique') }}
{{ Form::text('code_geographique','', array('class' => 'form-control')) }}

{{ Form::label('annee_maj', ' Année de mise à jour : ') }}
{{ Form::text('annee_maj','', array('class' => 'form-control')) }}
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
