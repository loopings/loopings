@extends('layouts.master')
@section('title')
Liens généraux
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
	@if (Session::has('meslienG'))
	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<p>Une erreur s'est produite avec les meslienG suivant : {{Session::get('meslienG')}}</p>
		<p>
			<a href="mailto:sidsic-support-ddt@isere.gouv.fr?subject=Erreur Loopings&body={{Session::get('meslienG')}}" class="alert-link">
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
					Nom du lien
				</th>
				<th>
					Lien
				</th>
				

				<th colspan="1">Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($lienGs as $lienG)
			<tr>
				<td>
					{{$lienG->nom}}
				</td>

				<td>
					{{$lienG->lien}}
				</td>
				
				
			<td style="width:50px">
				<a href="#" data-href="lienG/{{$lienG->id}}/edit" data-toggle="modal" data-target="#ModalMod" class="btn btn-link">
					<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
				</a>
			</td>

			
		</tr>
			@endforeach 
		</tbody>
	</table>
</div>

<div class="col-md-3">
	<div class="dataTables_info" role="status" aria-live="polite">
		<h4>Affichage de {{$lienGs->count()}} enregistrements sur un total de {{$lienGs->total()}}</h4>
	</div>
</div>
<div class="col-md-6">
	<div class="dataTables_paginate paging_simple_numbers">
		{{$lienGs->links()}}
	</div>
</div>


@endsection
