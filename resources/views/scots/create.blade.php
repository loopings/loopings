@extends('layouts.master')
@section('title')
Nouveau SCOT
@endsection
@section('subtitle')

@endsection
@section('javascript')

@endsection
@section('content')
<div class="col-md-6">
  {{Form::open(['url' => '/scot', 'method' => 'post'])}}
  <div class="panel panel-default">
    <div class="panel-heading">Général</div>
    <div class="panel-body">

{{ Form::label('nom', 'Nom scot : ') }}
{{ Form::text('nom_scot','', array('class' => 'form-control')) }}

{{ Form::label('rapport_presentation', ' Rapport de présentation : ') }}
{{ Form::text('rapport_presentation','', array('class' => 'form-control')) }}

{{ Form::label('padd', 'PADD : ') }}
{{ Form::text('padd','', array('class' => 'form-control')) }}

{{ Form::label('doo', 'DOO : ') }}
{{ Form::text('doo','', array('class' => 'form-control')) }}

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
