@extends('layouts.master')
@section('title')
  Titre de la page
@endsection
@section('subtitle')
  Sous titre de la page
@endsection
@section('content')
  <div class="col-md-6">
    {{Form::open(['url' => 'foo/bar', 'method' => 'post'])}}
      <div class="form-group">
        {{Form::label('nom', 'Nom')}}
        {{Form::text('nom', $nom, ['class' => 'form-control'])}}
      </div>
      <div class="form-group">
        {{Form::label('prenom', 'Prénom')}}
        {{Form::text('prenom', $prenom, ['class' => 'form-control'])}}
      </div>
      <div class="form-group">
        {{Form::label('username', 'Nom d\'utilisateur')}}
        {{Form::text('username', $username , ['class' => 'form-control'])}}
      </div>
      <div class="form-group">
        {{Form::label('droits', 'Droits')}}
      </div>
      <div class="form-group">
        {{Form::label('admin', 'Administrateur', ['class' => 'inline'])}}
        @if ($groupe == 1)
          {{Form::radio('admin', 'Administrateur', true)}}
        @else
          {{Form::radio('admin', 'Administrateur')}}
        @endif
        {{Form::label('lecture', 'Lecture', ['class' => 'inline'])}}
        @if ($groupe == 2)
          {{Form::radio('lecture', 'Lecture', true)}}
        @else
          {{Form::radio('lecture', 'Lecture')}}
        @endif
        {{Form::label('ecriture', 'Ecriture', ['class' => 'inline'])}}
        @if ($groupe == 3)
          {{Form::radio('ecriture', 'Ecriture', true)}}
        @else
          {{Form::radio('ecriture', 'Ecriture')}}
        @endif
      </div>
      {{Form::button('Enregistrer', ['class' => 'btn btn-default', 'type' => 'submit'])}}
      {{Form::button('Annuler', ['class' => 'btn btn-default', 'type' => 'reset'])}}
    {{Form::close()}}
  </div>
@endsection
