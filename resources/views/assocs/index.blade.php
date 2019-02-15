@extends('layouts.master')


@section('route')
/
@endsection


@section('title')
{{$comm->nom_comm}}
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
          <h1 class="panel-title">Association Communes</h1>
        </div>
        <div class="panel-body">
		<div class="list-group">

			<a href="/assoc/create/assoc_cantons/cantons_ddt38/nom_canton/id_cant/{{$comm->id}}" class="list-group-item list-group-item-action">
				Cantons
			</a>
			

			<a href="/assoc/create/assoc_appb/appb_ddt38/nom_appb/id_appb/{{$comm->id}}" class="list-group-item list-group-item-action">
				APPB
			</a>


			
			<a href="/assoc/create/assoc_icpe/icpe_ddt38/ents_proprietaire/id_icpe/{{$comm->id}}" class="list-group-item list-group-item-action">
				ICPE
			</a>
			

			
			
			<a href="/assoc/create/assoc_natura2000/natura2000_ddt38/nom_natura2000/id_natura2000/{{$comm->id}}" class="list-group-item list-group-item-action">
				Natura2000
			</a>


			
			<a href="/assoc/create/assoc_znieff/znieff_ddt38/nom_znieff/id_znieff/{{$comm->id}}" class="list-group-item list-group-item-action">
				ZNIEFF
			</a>

			<a href="/assoc/create/assoc_reserve/reserve_ddt38/nom_reserve/id_reserve/{{$comm->id}}" class="list-group-item list-group-item-action">
				Réserve
			</a>
			


			<a href="/assoc/create/assoc_zp/zp_ddt38/site_patri_remarq/id_zp/{{$comm->id}}" class="list-group-item list-group-item-action">
				Site patrimoniaux remarquables
			</a>


			<a href="/assoc/create/assoc_cf/cf_ddt38/nom_chforest/id_chforest/{{$comm->id}}" class="list-group-item list-group-item-action">
				Chartes forestières
			</a>
			

			
			<a href="/assoc/create/assoc_cm/cm_ddt38/nom_contrat/id_cm/{{$comm->id}}" class="list-group-item list-group-item-action">
				Contrats milieux
			</a>

			


			<a href="/assoc/create/assoc_sage/sage_ddt38/nom_sage/id_sage/{{$comm->id}}" class="list-group-item list-group-item-action">
				SAGE
			</a>
			

			
			<a href="/assoc/create/assoc_step/step_ddt38/nom_step/id_step/{{$comm->id}}" class="list-group-item list-group-item-action">
				STEP
			</a>
			
			<a href="/assoc/create/assoc_captage/captage_ddt38/nom_captage/id_captage/{{$comm->id}}" class="list-group-item list-group-item-action">
				CAPTAGE
			</a>
			
			<a href="/assoc/create/assoc_res_strat/resstrat_ddt38/nom_resstrat/id_res_strat/{{$comm->id}}" class="list-group-item list-group-item-action">
				Ressource stratégique pour l'avenir(aires à préserver)
			</a>

			<a href="/assoc/create/assoc_comp_eaup/colcompeaup_ddt38/nom_colcompeaup/id_col/{{$comm->id}}" class="list-group-item list-group-item-action">
				Collectivité compétente en distribution d'eau potable
			</a>

			<a href="/assoc/create/assoc_col_gest_eaup/colgesteaup_ddt38/nom_colgesteaup/id_col/{{$comm->id}}" class="list-group-item list-group-item-action">
				Service gestionnaire d'eau potable
			</a>

			<a href="/assoc/create/assoc_comp_eauu/colcompeauu_ddt38/nom_colcompeauu/id_col/{{$comm->id}}" class="list-group-item list-group-item-action">
				Collectivité compétente en traitement d'eaux usées
			</a>

			<a href="/assoc/create/assoc_col_gest_ass/colgestass_ddt38/nom_colgestass/id_col/{{$comm->id}}" class="list-group-item list-group-item-action">
				Service gestionnaire de l'assainissement
			</a>

			<a href="/assoc/create/assoc_aoc_aop/aocaop_ddt38/nom_aocaop/id_aoc_aop/{{$comm->id}}" class="list-group-item list-group-item-action">
				AOC/AOP
			</a>


		</div>
      </div>
  </div>





@endsection
