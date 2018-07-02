@extends('layouts.master')


@section('route')
/
@endsection


@section('title')
{{$epci->nom_groupement}}
@endsection
@section('subtitle')

@endsection
@section('javascript')

// tooltip demo
$('.tooltip-demo').tooltip({
selector: "[data-toggle=tooltip]",
container: "body"
})
// popover demo
$("[data-toggle=popover]")
.popover()
// Script pour la confirmation de suppression
$('#ModalSupp').on('show', function() {
var id = $(this).data('id'),
removeBtn = $(this).find('.danger');
})
//Confirmation de suppression
$('.confirm-delete').on('click', function(e) {
e.preventDefault();

var id = $(this).data('id');
$('#ModalSuppr').data('id', id).modal('show');
});

$('#btnYes').click(function() {
var id = $('#ModalSuppr').data('id');

document.getElementById(id).submit();
});
//Fin de confirmation de suppression
//Confirmation de modification
$('#ModalMod').on('show.bs.modal', function(e) {
$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});
//Fin de confirmation de modification
@endsection



@section('content')

<div class="col-md-4 col-md-offset-4">
	@if ($message )
	@if($result==0)
	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<p>Une erreur s'est produite avec les message suivant : {{$message}}</p>
		<p>
			<a href="mailto:sidsic-support-ddt@isere.gouv.fr?subject=Erreur Loopings&body={{Session::get('message')}}" class="alert-link">
				Signaler cette erreur au support
			</a>
		</p>
	</div>
	@else
	<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<p><b> {{$message}}</b></p>

	</div>

	@endif
	@endif
</div>
<br><br><br><br>
		<div class="panel panel-primary">

        <div class="panel-heading">
          <h1 class="panel-title">Association EPCI</h1>
        </div>
        <div class="panel-body">
         		<div class="list-group">
	
			<a href="/assoce/create/assoc_contact_cm/contactcm_ddt38/nom_contactcm/id_contact/{{$epci->id}}" class="list-group-item list-group-item-action">
				Contact contrat milieux
			</a>
			

			<a href="/assoce/create/assoc_tepos_pepcv/tepospepcv_ddt38/nom_tepospepcv/id_tp/{{$epci->id}}" class="list-group-item list-group-item-action">
				 TEPOS ou PEPCV
			</a>


			
			<a href="/assoce/create/assoc_pfre/pfre_ddt38/nom_pfre/id_pfre/{{$epci->id}}" class="list-group-item list-group-item-action">
				PFRE
			</a>
		</div>
      </div>
  </div>




@endsection
