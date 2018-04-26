@extends('layouts.master')

@section('title')
Mise à jour 
@endsection

@section('content')



<div class="col-md-6">
	{{Form::model($agriculture, ['method' => 'PUT', 'action' => ['Agricultures@update',$agriculture->id]]) }}
	<div class="panel panel-default">
		<div class="panel-heading">Général</div>
		<div class="panel-body">

			{{ Form::label('exploit', 'Nombre d’exploitations agricoles : ') }}
			{{ Form::text('exploit',$agriculture->exploit, array('class' => 'form-control')) }}

			{{ Form::label('unitravail', 'Nombre d’unités de travail annuel : ') }}
			{{ Form::text('unitravail',$agriculture->unitravail, array('class' => 'form-control')) }}

			{{ Form::label('sau_ha', 'Surface Agricole Utile en hectares : ') }}
			{{ Form::text('sau_ha',$agriculture->sau_ha, array('class' => 'form-control')) }}

			{{ Form::label('cheptel', 'Taille du cheptel : ') }}
			{{ Form::text('cheptel',$agriculture->cheptel, array('class' => 'form-control')) }}

			{{ Form::label('orientecheco', 'Orientation technico-économique : ') }}
			{{ Form::text('orientecheco',$agriculture->orientecheco, array('class' => 'form-control')) }}

			{{ Form::label('surflabour_ha', 'Surfaces labourables en hectares : ') }}
			{{ Form::text('surflabour_ha',$agriculture->surflabour_ha, array('class' => 'form-control')) }}

			{{ Form::label('surfcultperm_ha', 'Surfaces de cultures permanentes en hectares : ') }}
			{{ Form::text('surfcultperm_ha',$agriculture->surfcultperm_ha, array('class' => 'form-control')) }}

			{{ Form::label('surfherbe_ha', 'Surfaces en herbes en hectares : ') }}
			{{ Form::text('surfherbe_ha',$agriculture->surfherbe_ha, array('class' => 'form-control')) }}

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
