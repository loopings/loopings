@extends('layouts.master')

@section('title')
Mise à jour
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
      <a href="#urbanisme" aria-controls="urbanisme" role="tab" data-toggle="tab">
        Urbanisme/transitions energétiques/déplacements 
      </a>
    </li>
    <li role="presentation">
      <a href="#logement" aria-controls="logement" role="tab" data-toggle="tab">
        Logement, politique de la ville et foncier 
      </a>
    </li>

    <li role="presentation">
    <a href="#fusion" aria-controls="fusion" role="tab" data-toggle="tab">
        fusion
      </a>
    </li>
  </ul> 

</div>
{{Form::model($comm, ['method' => 'PUT', 'action' => ['Comms@update',$comm->id]]) }}
<!-- Tab panes -->
<div class="tab-content">

  <div role="tabpanel" class="tab-pane active" id="adm">
    @include('comms.partEditAdm')
  </div>

  <div role="tabpanel" class="tab-pane" id="rnp">
    @include('comms.partEditRnp')
  </div>

  <div role="tabpanel" class="tab-pane" id="urbanisme">
    @include('comms.partEditUrba')
  </div>
  <div role="tabpanel" class="tab-pane" id="logement">
    @include('comms.partEditLog')
  </div>

    <div role="tabpanel" class="tab-pane" id="fusion">
    @include('comms.partEditFusion')
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
