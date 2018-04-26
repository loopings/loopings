@extends('layouts.master')

@section('title')
epcis
@endsection

@section('content')
@if (Session::has('message'))


<div class="alert alert-danger alert-dismissible fade in" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">
			×
		</span>
	</button>
	<h4>
		erreur!
	</h4> 
	<p>
		{{Session::get('message')}}
	</p>
</div>




@endif
<br>

<div class="btn-group pull-right">
  <button type="button" class="btn btn-default  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Autres actions sur la table <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">

    <li><a href="#">Ajouter une même donnée à toute une colonne </a></li>
    <li><a href="#">Supprimer toutes les contenus d'une même  </a></li>

  </ul>
</div>

<br><br><br>

<div >


<a href="epci/create">
	<button type="button" class="btn btn-primary btn-lg btn-block"  >
		<span class="glyphicon glyphicon-plus-sign" aria-hidden="true" ></span> Ajouter un epci
	</button>
</a>

<br>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>
				nom_groupement
			</th>
			<th>
				type_epci
			</th>
			<th>
				code_siren
			</th>
			<th>
				civilite 
			</th>
			<th>
				prenom_president 
			</th>
			<th>
				nom_president 
			</th>
			<th>
				adresse_siege 
			</th>
			<th>
				code_postal 
			</th>
			<th>
				tel 
			</th>
			<th>
				fax 
			</th>
			<th>
				courriel 
			</th>
			<th>
				site_internet 
			</th>

			<th>
				vulnerabilite_energetique 
			</th>
			<th>
				libelle_pdu 
			</th>
			<th>
				etat_avancement_pdu 
			</th>
			<th>
				date_validation_pdu 
			</th>
			<th>
				lien_doc_pdu 
			</th>
			<th>
				libelle_plh 
			</th>
			<th>
				etat_avancement_plh 
			</th>
			<th>
				date_validation_plh 
			</th>
			<th>
				lien_doc_plh 
			</th>
			<th>
				doc_ofpi 
			</th>
			<th>
				video_epci_foncier 
			</th>
			<th>
				etat 
			</th>
			<th>
				resultat_fusion 
			</th>


			<th colspan="2">Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach($epcis as $epci)
		<tr>

			<td>
				{{$epci->nom_groupement}}
			</td>

			<td>
				{{$epci->type_epci}}
			</td>

			<td>
				{{$epci->code_siren}}
			</td>

			<td>
				{{$epci->civilite}}
			</td>

			<td>
				{{$epci->prenom_president}}
			</td>

			<td>
				{{$epci->nom_president}}
			</td>

			<td>
				{{$epci->adresse_siege}}
			</td>

			<td>
				{{$epci->code_postal}}
			</td>

			<td>
				{{$epci->tel}}
			</td>

			<td>
				{{$epci->fax}}
			</td>

			<td>
				{{$epci->courriel}}
			</td>

			<td>
				{{$epci->site_internet}}
			</td>

			
			<td>
				{{$epci->vulnerabilite_energetique}}
			</td>

			<td>
				{{$epci->libelle_pdu}}
			</td>

			<td>
				{{$epci->etat_avancement_pdu}}
			</td>

			<td>
				{{$epci->date_validation_pdu}}
			</td>

			<td>
				{{$epci->lien_doc_pdu}}
			</td>

			<td>
				{{$epci->libelle_plh}}
			</td>

			<td>
				{{$epci->etat_avancement_plh}}
			</td>

			<td>
				{{$epci->date_validation_plh}}
			</td>

			<td>
				{{$epci->lien_doc_plh}}
			</td>

			<td>
				{{$epci->doc_ofpi}}
			</td>

			<td>
				{{$epci->video_epci_foncier}}
			</td>

			<td>
				{{$epci->etat}}
			</td>

			<td>
				{{$epci->resultat_fusion}}
			</td>



			
			<td>
				<a href="epci/{{$epci->id}}/edit" onclick="if(!confirm('Êtes vous sûr de vouloir modifier')) return false;">
					<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
				</a>

			</td>

			<td>

				<form action="epci/{{$epci->id}}" method="POST">
					<input type="hidden" name="_method" value="DELETE">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button class="btn btn-link" type="submit"   onclick="if(!confirm('Voulez-vous Supprimer')) return false;">
						<spn class="glyphicon glyphicon-remove"></span>
						</button>
					</form>

				</td>


			</tr>
			@endforeach	
		</tbody>

	</table>
	{{$epcis->links()}}

	</div>
	@endsection
