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

<div class="col-md-12">
	<table class="table table-striped">
		
		<tbody>

			<tr>
				<td>
					<a href="/assoc/create/assoc_cantons/cantons_ddt38/nom_canton/id_cant/{{$comm->id}}" class="btn btn-info "  style="width: 150px">
						Cantons
					</a>
				</td>
				
				<td>
					<a href="/assoc/create/assoc_appb/appb_ddt38/nom_appb/id_appb/{{$comm->id}}" class="btn btn-info "  style="width: 150px">
						APPB
					</a>
				</td>

				<td> 
					<a href="/assoc/create/assoc_icpe/icpe_ddt38/ents_proprietaire/id_icpe/{{$comm->id}}" class="btn btn-info "  style="width: 150px">
						ICPE
					</a>
				</td>
			</tr>

			<tr>
				<td>
					<a href="/assoc/create/assoc_maet/maet_ddt38/nom_maet/id_maet/{{$comm->id}}" class="btn btn-info "  style="width: 150px">
						MAET
					</a>
				</td>
				
				<td>
					<a href="/assoc/create/assoc_natura2000/natura2000_ddt38/nom_natura2000/id_natura2000/{{$comm->id}}" class="btn btn-info "  style="width: 150px">
						Natura2000
					</a>
				</td>

				<td> 
					<a href="/assoc/create/assoc_znieff/znieff_ddt38/nom_znieff/id_znieff/{{$comm->id}}" class="btn btn-info "  style="width: 150px">
						ZNIEFF
					</a>
				</td>
			</tr>


			<tr>
				<td>
					<a href="/assoc/create/assoc_zp/zp_ddt38/id/id_zp/{{$comm->id}}" class="btn btn-info "  style="width: 150px">
						ZP
					</a>
				</td>
				
				<td>
					<a href="/assoc/create/assoc_cf/cf_ddt38/nom_chforest/id_chforest/{{$comm->id}}" class="btn btn-info "  style="width: 150px">
						Chartes forestières
					</a>
				</td>

				<td> 
					<a href="/assoc/create/assoc_cr/cr_ddt38/nom_contrat/id_contrat_riviere/{{$comm->id}}" class="btn btn-info "  style="width: 150px">
						Contrats rivières
					</a>
				</td>
			</tr>


			<tr>
				<td>
					<a href="/assoc/create/assoc_digues/digues_ddt38/id/id_digue/{{$comm->id}}" class="btn btn-info "  style="width: 150px">
						Digues
					</a>
				</td>
				
				<td>
					<a href="/assoc/create/assoc_sage/sage_ddt38/nom_sage/id_sage/{{$comm->id}}" class="btn btn-info "  style="width: 150px">
						SAGE
					</a>
				</td>

				<td> 
					<a href="/assoc/create/assoc_step/step_ddt38/nom_step/id_step/{{$comm->id}}" class="btn btn-info "  style="width: 150px">
						STEP
					</a>
				</td>
			</tr>


					<tr>
					<td></td>
				<td>
					<a href="/assoc/create/assoc_troncons/troncons_ddt38/id/id_tr/{{$comm->id}}" class="btn btn-info "  style="width: 150px">
						Tronçons
					</a>
				</td>
				<td></td>
			</tr>
		</tbody>
	</table>
</div>



@endsection
