@extends('layouts.master')
@section('title')
{{$comm->nom_comm}}
@endsection
@section('subtitle')

@endsection
@section('javascript')
$('#tables').multiSelect()
@endsection
@section('content')

<div class="col-md-8 col-md-offset-2">
	{{Form::open(['url' => '/assoc/store', 'method' => 'post'])}}
	<div class="panel panel-default">
		<div class="panel-heading">Associations</div>
		<div class="panel-body">
			<select multiple="multiple" id="tables" name="tables[]"  >
				@foreach ($tables as $table)
				<option value="{{$table->id}}" 
					@foreach ($assocs as $assoc)
					@if($table->id==$assoc->{$nomid}) selected @endif
					@endforeach >

					{{$table-> {$typenom}  }}
				</option>
				@endforeach
			</select>

			{{ Form::hidden('id_comm',$comm->id, array('class' => 'form-control')) }}
			{{ Form::hidden('type_assoc',$type_assoc, array('class' => 'form-control')) }}
			{{ Form::hidden('nomid',$nomid, array('class' => 'form-control')) }}



		</div>
	</div>
	<br>
<div class="col-md-offset-5">

	{{Form::button('Enregistrer', ['class' => 'btn btn-default', 'type' => 'submit'])}}
	{{Form::button('Annuler', ['class' => 'btn btn-default', 'type' => 'reset'])}}
	{{Form::close()}}
</div>
</div>


@endsection
