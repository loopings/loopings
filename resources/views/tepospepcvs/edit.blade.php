@extends('layouts.master')

@section('title')
Mise à jour 
@endsection

@section('content')


<div class="col-md-6">
{{Form::model($tepospepcv, ['method' => 'PUT', 'action' => ['Tepospepcvs@update',$tepospepcv->id]]) }}
  <div class="panel panel-default">
		<div class="panel-heading">Général</div>
		<div class="panel-body">





{{ Form::label('nom_tepospepcv', ' Nom tepospepcv : ') }}
{{ Form::text('nom_tepospepcv',$tepospepcv->nom_tepospepcv, array('class' => 'form-control')) }}

{{ Form::label('tepos_ou_pepcv', ' Type : ') }}
 {{Form::select('tepos_ou_pepcv', array('TEPOS'=>'TEPOS','PEPCV'=>'PEPCV') ,$tepospepcv->tepos_ou_pepcv, ['placeholder' => 'Sélectionner un type', 'class' => 'form-control'])}}

{{ Form::label('annee_maj', 'Année de mise à jour : ') }}
{{ Form::text('annee_maj',$tepospepcv->annee_maj, array('class' => 'form-control')) }}


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
