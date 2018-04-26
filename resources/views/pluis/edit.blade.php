@extends('layouts.master')

@section('title')
Mise à jour 
@endsection

@section('content')



<div class="col-md-6">
	{{Form::model($plui, ['method' => 'PUT', 'action' => ['Pluis@update',$plui->id]]) }}
	<div class="panel panel-default">
		<div class="panel-heading">Général</div>
		<div class="panel-body">

			{{ Form::label('perimetre', 'Périmètre : ') }}
			{{ Form::text('perimetre',$plui->perimetre, array('class' => 'form-control')) }}

			{{ Form::label('type_plui', 'Type de plui: ') }}
			{{ Form::text('type_plui',$plui->type_plui, array('class' => 'form-control')) }}

			{{ Form::label('correspondant_ddt', 'Correspondant DDT: ') }}
			{{ Form::text('correspondant_ddt',$plui->correspondant_ddt, array('class' => 'form-control')) }}

			{{ Form::label('etat_avancement_plui', 'Etat d\'avancement de la démarche: ') }}
			{{ Form::text('etat_avancement_plui',$plui->etat_avancement_plui, array('class' => 'form-control')) }}

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
