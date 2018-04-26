@extends('layouts.master')
@section('title')
Utilisateurs
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

//Confirmation de réinitialisation
$('.confirm-reset').on('click', function(e) {
e.preventDefault();

var id = $(this).data('id');
$('#ModalReset').data('id', id).modal('show');
});

$('#btnReset').click(function() {
var id = $('#ModalReset').data('id');

document.getElementById(id).submit();
});
//Fin de confirmation de réinitialisation
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
<div class="modal fade" id="ModalReset" tabindex="-1" role="dialog" aria-labelledby="ModalResetLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Confirmer la réinitialisation</h4>
			</div>
			<div class="modal-body">
				Etes-vous sûr(e) de vouloir réinitialiser le mot de passe de cet utilisateur ?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" id="btnReset">Oui</button>
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
				<th>Nom</th>
				<th>Email</th>
				<th>Niveau</th>
				<th colspan="3">Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<td>
					{{ $user->name }}
				</td>
				<td>
					{{ $user->email }}
				</td>
				<td>
					{{ $user->level }}
				</td>
			<td>
				<a href="#" data-href="users/{{$user->id}}/edit" data-toggle="modal" data-target="#ModalMod" class="btn btn-link">
					<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
				</a>
			</td>
			<td>
				<form action="users/{{$user->id}}"  method="POST" id="{{$user->id}}">
					<input type="hidden" name="_method" value="DELETE">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button class="btn btn-link confirm-delete" type="submit" data-id="{{$user->id}}">
						<span class="glyphicon glyphicon-remove"></span>
					</button>
				</form>
			</td>
			<td>
				<form action="users/reset"  method="POST" id="{{$user->id}}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button class="btn btn-link confirm-reset" type="submit" data-id="{{$user->id}}">
						<span class="glyphicon glyphicon-lock"></span>
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
		<a href="user/create" class="btn btn-success btn-lg">
			Ajouter
		</a>
	</div>
</div>
<div class="col-md-3">
	<div class="dataTables_info" role="status" aria-live="polite">
		<h4>Affichage de {{$users->count()}} enregistrements sur un total de {{$users->total()}}</h4>
	</div>
</div>
<div class="col-md-6">
	<div class="dataTables_paginate paging_simple_numbers">
		{{$users->links()}}
	</div>
</div>


@endsection
