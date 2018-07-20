
<div class="col-md-12">
	<div class="card" >
		<div class="card-block">
			<h3 class="card-title">Informations </h3>
			<ul class="list-group">

				<li class="list-group-item justify-content-between "> 
					Commune soumise à la loi SRU  
					<b>@if(!isset($comm->loi_sru))
						pas d'information	
						@else
						{{$comm->loi_sru}}
						@endif
					</b>
				</li>
				<li class="list-group-item justify-content-between ">
					Commune carencée
					<b> 
						@if(!isset($comm->comm_carencee))
						pas d'information	
						@else
						@if($comm->comm_carencee)Oui
						@else Non
						@endif
						@endif
					</b> 
				</li>
				<li class="list-group-item justify-content-between ">
					Commune exonérée
					<b> 
						@if(!isset($comm->comm_exoneree))
						pas d'information	
						@else
						@if($comm->comm_exoneree)Oui
						@else Non
						@endif
						@endif
					</b> 
				</li>


				<li class="list-group-item justify-content-between ">
					Objectif SCOT de production de logement
					<b> {{$comm->dec_objectif}} logements par an et pour 1000 habitants</b> 
				</li>

				<li class="list-group-item justify-content-between ">
					Objectif SCOT appliqué à la commune
					<b> {{$comm->objectif_log_cons}} logements</b> 
				</li>

				<li class="list-group-item justify-content-between ">
					Type de polarité défini dans le SCOT 
					<b> {{$comm->type_polarite}} </b> 
				</li>
				<li class="list-group-item justify-content-between ">
					Commune concernée par un PLH ou PLHI
					<b>
						@if(!isset($comm->libelle_plh))
						Non
						@else
						{{$comm->libelle_plh}}
						{{$comm->etat_avancement_plh}}
						{{$comm->date_validation_plh}}
						{{$comm->lien_doc_plh}}
						@endif
					</b>
				</li>
				<li class="list-group-item justify-content-between "> 
					Commune "touristique" R.133-42 du code du tourisme ou "station classé de tourise"
					<b>@if(!isset($comm->comm_tourist))
						pas d'information	
						@else
						{{$comm->comm_tourist}}
						@endif
					</b>
				</li>
				<li class="list-group-item justify-content-between ">
					Nombre de Logements du Parc Privé Potentiellement Indigne PPPI
					<b> {{$comm->nb_ppi}} </b> 
				</li>
				
			</ul>


		</div>
	</div>
</div>


<div class="col-md-12">
	<div class="card" >
		<div class="card-block">
			<h3 class="card-title">Politique de la ville </h3>
			<ul class="list-group">

				<li class="list-group-item justify-content-between "> 
					Liste des quartiers prioritaires QP de la politque de la ville 
					<b class="text-left">
						@foreach($lienGs as $lienG)
						@if($lienG->nom=="liste_qp")
							{{$lienG->lien}}
						@endif
						@endforeach
					</b>
				</li>
				<li class="list-group-item justify-content-between ">
					Lien vers la carte interactive du site "politique de la ville" zoomé sur la commune interrogée
					<b>@if(!isset($comm->lien_politique_ville))
						non disponible	
						@else
						<a href="{{$comm->lien_politique_ville}}" target="_blank">
							<b>Cliquez ici</b>
						</a>
						@endif
					</b>
				</li>
			</ul>

		</div>
	</div>
</div>


<div class="col-md-12">
	<div class="card" id="lgmts">
		<div class="card-block">
			<h3 class="card-title">Logements </h3>
			
			<table class="table">
				<thead class="thead-default">
					<tr>

						<th style="vertical-align:text-top;">Année </th>
						<th style="vertical-align:text-top;"> Total  </th>
						<th style="vertical-align:text-top;">  Résidences principales(dont construites avant 1975)</th>
						<th style="vertical-align:text-top;">  Résidences secondaires   </th>
						<th style="vertical-align:text-top;"> Logements vacants    </th>
						<th style="vertical-align:text-top;">   Maisons </th>
						<th style="vertical-align:text-top;">   Appartements  </th>
						<th style="vertical-align:text-top;">    Logements sociaux </th>
						
					</tr>
				</thead>
				<tbody>

					@foreach($lgmts as $lgmt)	
					<tr>

						<td> {{$lgmt->annee}}   </td>
						<td> {{$lgmt->total_lgmts}}  </td>
						<td> {{$lgmt->resid_princ}}({{$lgmt->res_princ_av_75}})  </td>
						<td> {{$lgmt->resid_second}}  </td>
						<td> {{$lgmt->lgmts_vacants}}  </td>
						<td> {{$lgmt->maisons}}  </td>
						<td> {{$lgmt->appartements}}  </td>
						<td> {{$lgmt->lgmts_sociaux}}  </td>
					</tr>
					@endforeach
				</tbody>
			</table>	


		</div>
	</div>
</div>



<div class="col-md-12">
	<div class="card" id="lien5">
		<div class="card-block">
			<h3 class="card-title"><i class="glyphicon glyphicon-link"></i>Liens utiles</h3>
			<ul class="list-group">
				@foreach($lien_theme5s as $lien_theme5)
				<li class="list-group-item justify-content-between ">{{$lien_theme5->libelle}} :
					<a href="{{$lien_theme5->lien}}" target="_blank" style="max-width: 90%;" >
						<b>Cliquez ici <br></b>
					</a>
				</li>	
				@endforeach



			</ul>
		</div>
	</div>
</div>