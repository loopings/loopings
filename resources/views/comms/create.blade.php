@extends('layouts.master')
@section('title')
Nouvelle commune
@endsection
@section('subtitle')
Formulaire de création des communes
@endsection
@section('javascript')
$('#myTabs a').click(function (e) {
e.preventDefault()
$(this).tab('show')
});
$('#cantons').multiSelect();

$(':checkbox').checkboxpicker();
@endsection
@section('content')


<div class="col-md-12">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs nav-pills" role="tablist">
    <li role="presentation" class="active">
      <a href="#adm" aria-controls="adm" role="tab" data-toggle="tab">
        Fiche administrative
      </a>
    </li>
    <li role="presentation">
      <a href="#rnp" aria-controls="rnp" role="tab" data-toggle="tab">
        Ressources naturelles/eaux et forets
      </a>
    </li>

    <li role="presentation">
      <a href="#urbanisme" aria-controls="urbanisme et risques" role="tab" data-toggle="tab">
        Urbanisme/transitions energétiques/déplacements
      </a>
    </li>
    <li role="presentation">
      <a href="#logement" aria-controls="logement et foncier" role="tab" data-toggle="tab">
        Logement, politique de la ville et foncier 
      </a>
    </li>
  </ul> 

  </div>
{{Form::open(['url' => '/comm', 'method' => 'post'])}}
  <!-- Tab panes -->
  <div class="tab-content">

      <div role="tabpanel" class="tab-pane active" id="adm">
        @include('comms.partCreateAdm')
      </div>

      <div role="tabpanel" class="tab-pane" id="rnp">
        @include('comms.partCreateRnp')
      </div>

      <div role="tabpanel" class="tab-pane" id="urbanisme">
        @include('comms.partCreateUrba')
      </div>
    <div role="tabpanel" class="tab-pane" id="logement">
      @include('comms.partCreateLog')
    </div>

   </div>

<div class="col-md-12">
  {{Form::button('Enregistrer', ['class' => 'btn btn-default', 'type' => 'submit'])}}
  {{Form::button('Annuler', ['class' => 'btn btn-default', 'type' => 'reset'])}}
  {{Form::close()}}
</div>

<div class="col-md-12">
  <br>
<a class="btn btn-success btn-lg" href="{{ URL::previous() }}" ><i class="fa fa-arrow-circle-o-left"></i>back</a>
</div>

@endsection
