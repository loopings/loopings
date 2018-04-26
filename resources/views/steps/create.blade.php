@extends('layouts.master')
@section('title')
nouvelle station
@endsection
@section('subtitle')

@endsection
@section('javascript')

@endsection
@section('content')
<div class="col-md-6">
  {{Form::open(['url' => '/step', 'method' => 'post'])}}
  <div class="panel panel-default">
    <div class="panel-heading">Général</div>
    <div class="panel-body">



{{ Form::label('nom_step', ' Nom STEP : ') }}
{{ Form::text('nom_step','', array('class' => 'form-control')) }}


{{ Form::label('niveau_priorite', 'Niveau de priorité : ') }}
{{ Form::text('niveau_priorite','', array('class' => 'form-control')) }}

{{ Form::label('capacite', 'Capacité de traitement de la STEP : ') }}
{{ Form::text('capacite','', array('class' => 'form-control')) }}

{{ Form::label('date_courrier', 'Date courrier : ') }}
{{ Form::text('date_courrier','', array('class' => 'form-control')) }}

{{ Form::label('mise_en_demeure', 'Mise en demeure : ') }}
{{ Form::text('mise_en_demeure','', array('class' => 'form-control')) }}

{{ Form::label('annee_mis_en_dem', 'Année de mise en demeure : ') }}
{{ Form::text('annee_mis_en_dem','', array('class' => 'form-control')) }}

{{ Form::label('annee_maj', 'Année de mise à jour de la donnée : ') }}
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
