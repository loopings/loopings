@extends('layouts.master')
@section('title')
Nouveau lien
@endsection
@section('subtitle')

@endsection

@section('content')
<div class="col-md-6">
  {{Form::open(['url' => '/lien', 'method' => 'post'])}}
  <div class="panel panel-default">
    <div class="panel-heading">Général</div>
    <div class="panel-body">

      {{ Form::label('libelle', 'Libellé du lien : ') }}

      {{ Form::text('libelle','', array('class' => 'form-control')) }}

      {{Form::label('onglet', 'Onglet concerné : ')}}
      {{Form::select('onglet', [
      'Fiche administrative'=>'Fiche administrative',
      'Ressources naturelles et paysagères'=>'Ressources naturelles et paysagères',
      'Urbanismes, risques et déplacements'=>'Urbanismes, risques et déplacements',
      'Eau et forêts'=>'Eau et forêts',
      'Logement et politique de la ville'=>'Logement et politique de la ville',
      'Agriculture'=>'Agriculture',
      'Air et Bruit'=>'Air et Bruit ',
      'Foncier'=>'Foncier'


      ] ,null, ['placeholder' => 'Sélectionner  ', 'class' => 'form-control'])}}


      {{ Form::label('lien', 'Lien : ') }}

      {{ Form::text('lien','', array('class' => 'form-control')) }}

     <br>  
       {{ Form::label('ordre', 'Ordre du lien(entier) : ') }}
      {{ Form::selectRange('ordre', 1, $nb_liens) }}


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
