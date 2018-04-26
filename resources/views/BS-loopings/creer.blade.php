@extends('layouts.master')
@section('title')
  Titre de la page
@endsection
@section('subtitle')
  Sous titre de la page
@endsection
@section('javascript')
  <script type="text/javascript">
    $('#date-container input').datepicker({
      format: "dd/mm/yyyy",
      todayBtn: "linked",
      language: "fr",
      autoclose: true
    });
  </script>
@endsection
@section('content')
  <div class="col-md-6">
    {{Form::open(['url' => 'foo/bar', 'method' => 'post'])}}
      <div class="form-group">
        {{Form::label('nom', 'Nom')}}
        {{Form::text('nom', '', ['class' => 'form-control'])}}
      </div>
      <div class="form-group">
        {{Form::label('prenom', 'Prénom')}}
        {{Form::text('prenom', '', ['class' => 'form-control'])}}
      </div>
      <div class="form-group">
        {{Form::label('username', 'Nom d\'utilisateur')}}
        {{Form::text('username','' , ['class' => 'form-control'])}}
      </div>
      <div id="date-container" class="form-group">
        {{Form::label('date', 'Date')}}
        {{Form::text('date', '', ['class' => 'form-control'])}}
      </div>
      <div class="form-group">
        {{Form::label('droits', 'Droits')}}
      </div>
      <div class="form-group">
        {{Form::label('admin', 'Administrateur', ['class' => 'inline'])}}
        {{Form::radio('admin', 'Administrateur')}}
        {{Form::label('lecture', 'Lecture', ['class' => 'inline'])}}
        {{Form::radio('lecture', 'Lecture', true)}}
        {{Form::label('ecriture', 'Ecriture', ['class' => 'inline'])}}
        {{Form::radio('ecriture', 'Ecriture')}}
      </div>
      {{Form::button('Enregistrer', ['class' => 'btn btn-default', 'type' => 'submit'])}}
      {{Form::button('Annuler', ['class' => 'btn btn-default', 'type' => 'reset'])}}
    {{Form::close()}}
  </div>
@endsection
