@extends('layouts.master')
@section('title')
Barrages
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
<div class="modal fade" id="ModalSuppr" tabindex="-1" role="dialog" aria-labelledby="ModalSupprLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Confirmer la suppression</h4>
			</div>
			<div class="modal-body">
				Etes-vous sûr(e) de vouloir supprimer l'enregistrement ?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" id="btnYes">Oui</button>
				<button type="button" class="btn btn-success" data-dismiss="modal">Non</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="ModalMod" tabindex="-1" role="dialog" aria-labelledby="ModalModLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Confirmer la modification</h4>
			</div>
			<div class="modal-body">
				Etes-vous sûr(e) de vouloir modifier l'enregistrement ?
			</div>
			<div class="modal-footer">
				<a type="button" class="btn btn-danger btn-ok">Oui</a>
				<button type="button" class="btn btn-success" data-dismiss="modal">Non</button>
			</div>
		</div>
	</div>
</div>
<div class="col-md-4 col-md-offset-4">
	@if (Session::has('message'))
	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<p>Une erreur s'est produite avec les message suivant : {{Session::get('message')}}</p>
		<p>
			<a href="mailto:sidsic-support-ddt@isere.gouv.fr?subject=Erreur Loopings&body={{Session::get('message')}}" class="alert-link">
				Signaler cette erreur au support
			</a>
		</p>
	</div>
	@endif
</div>
<div class="col-md-12">
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>
					Nom communne
				</th>
				<th>
					Nom barrage
				</th>
				<th>
					Type barrage
				</th>
				<th>
					Nom gestionnaire
				</th>
				<th>
					Type gestionnaire
				</th>
				<th>
					Année de mise à jour de la donnée 
				</th>



				<th colspan="3">Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($barrages as $barrage)
			<tr>
				<td>
					{{$barrage->nom_comm}}
				</td>

				<td>
					{{$barrage->nom_barrage}}
				</td>

				<td>
					{{$barrage->type_barrage}}
				</td>
				<td>
					{{$barrage->nom_gestionnaire}}
				</td>

				<td>
					{{$barrage->type_gestionnaire}}
				</td>
				<td>
					{{$barrage->annee_maj}}
				</td>

				<td>
					<div class="tooltip-demo">
						<button data-html="true" data-original-title="
						<u><b>Autres champs dans cette table:</b></u> <br>
						" type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="">
						<span class="fa fa-ellipsis-h" aria-hidden="true"></span>
					</button>
				</div>
			</td>
			<td style="width:50px">
				<a href="#" data-href="barrage/{{$barrage->id}}/edit" data-toggle="modal" data-target="#ModalMod" class="btn btn-link">
					<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
				</a>
			</td>

			<td>
				<form action="barrage/{{$barrage->id}}"  method="POST" id="{{$barrage->id}}">
					<input type="hidden" name="_method" value="DELETE">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button class="btn btn-link confirm-delete" type="submit" data-id="{{$barrage->id}}">
						<span class="glyphicon glyphicon-remove"></span>
					</button>
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>
<div class="col-md-3">
	<div class="dataTables_info" role="status" aria-live="polite">
		<a href="barrage/create" class="btn btn-success btn-lg">
			Ajouter
		</a>
	</div>
</div>
<div class="col-md-3">
	<div class="dataTables_info" role="status" aria-live="polite">
		<h4>Affichage de {{$barrages->count()}} enregistrements sur un total de {{$barrages->total()}}</h4>
	</div>
</div>
<div class="col-md-6">
	<div class="dataTables_paginate paging_simple_numbers">
		{{$barrages->links()}}
	</div>
</div>


@endsection
