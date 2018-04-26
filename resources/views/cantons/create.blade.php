@extends('layouts.master')
@section('title')
Nouveau canton
@endsection
@section('subtitle')

@endsection
@section('javascript')

@endsection
@section('content')
<div class="col-md-6">
  {{Form::open(['url' => '/canton', 'method' => 'post'])}}
  <div class="panel panel-default">
    <div class="panel-heading">Général</div>
    <div class="panel-body">

{{ Form::label('name', 'Nom du canton : ') }}
 
 {{ Form::text('nom_canton','', array('class' => 'form-control')) }}
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
