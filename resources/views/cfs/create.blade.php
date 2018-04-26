@extends('layouts.master')
@section('title')
Nouvelle charte
@endsection
@section('subtitle')

@endsection
@section('javascript')

@endsection
@section('content')
<div class="col-md-6">
  {{Form::open(['url' => '/cf', 'method' => 'post'])}}
  <div class="panel panel-default">
    <div class="panel-heading">Général</div>
    <div class="panel-body">





{{ Form::label('demarche_en_cours', ' Démarche en cours : ') }}
{{ Form::text('demarche_en_cours','', array('class' => 'form-control')) }}


{{ Form::label('tx_bois', ' Taux de boisement : ') }}
{{ Form::text('tx_bois','', array('class' => 'form-control')) }}


{{ Form::label('existence_reg_bois', ' Existence réglementation boisement : ') }}
{{ Form::text('existence_reg_bois','', array('class' => 'form-control')) }}


{{ Form::label('existence_for_prot', ' Existence forêt protection : ') }}
{{ Form::text('existence_for_prot','', array('class' => 'form-control')) }}


{{ Form::label('annee_maj', ' Année de mise à jour de la donnée : ') }}
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
