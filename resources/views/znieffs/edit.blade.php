@extends('layouts.master')

@section('title')
Mise à jour 
@endsection

@section('content')


<div class="col-md-6">
{{Form::model($znieff, ['method' => 'PUT', 'action' => ['Znieffs@update',$znieff->id]]) }}
 <div class="panel panel-default">
		<div class="panel-heading">Général</div>
		<div class="panel-body">



{{ Form::label('nom_znieff', ' Nom ZNIEFF : ') }}
{{ Form::text('nom_znieff',$znieff->nom_znieff, array('class' => 'form-control')) }}

{{ Form::label('type_znieff', ' Type ZNIEFF : ') }}
{{ Form::text('type_znieff',$znieff->type_znieff, array('class' => 'form-control')) }}


{{ Form::label('annee_maj', 'Année de mise à jour :') }}
{{ Form::text('annee_maj',$znieff->annee_maj, array('class' => 'form-control')) }}



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
