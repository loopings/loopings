
<div class="row col-md-12">
	<div class="col-md-6 d-flex align-items-stretch">		
		<div class="card">
			<div class="card-block">
				<h3 class="card-title">Déplacements domicile-travail et actifs restants/sortants () </h3>
				<ul class="list-group">
					<li class="list-group-item justify-content-between "> 
						Nombre d'actifs total
						<b>
							@if(!isset($comm->nb_actifs))
							pas d'information	
							@else
							{{$comm->nb_actifs}}
							@endif

						</b>  
					</li>
					<li class="list-group-item justify-content-between "> 
						Actifs résidents travaillant<br>sur la commune
						<b>
							@if(!isset($comm->nb_actifs_restants))
							pas d'information	
							@else
							{{$comm->nb_actifs_restants}}
							@endif

						</b>  
					</li>
					<li class="list-group-item justify-content-between "> 
						Actifs résidents travaillant<br>hors de la commune
						<b>
							@if(!isset($comm->nb_actifs_sortants))
							pas d'information	
							@else
							{{$comm->nb_actifs_sortants}}
							@endif

						</b>  
					</li>

				</ul>
				
			</div>
		</div>
	</div>


	<div class="col-md-6 d-flex align-items-stretch">
		<div class="card">
			<div class="card-block">
				<h3 class="card-title">Motorisation des ménages dernières données disponibles (Donnée MaJ {{$comm->annee_maj_motor}}) </h3>
				<ul class="list-group">
					<li class="list-group-item justify-content-between "> 
						Nombre de ménages
						<b>
							@if(!isset($comm->nb_men_tot))
							pas d'information	
							@else
							{{$comm->nb_men_tot}}
							@endif

						</b>  
					</li>
					<li class="list-group-item justify-content-between "> 
						Ménage possédant au moins un véhicule
						<b>
							@if(!isset($comm->nb_men_1veh))
							pas d'information	
							@else
							{{$comm->nb_men_1veh}}
							@endif

						</b>  
					</li>
					<li class="list-group-item justify-content-between "> 
						Ménage possédant deux véhicules et plus
						<b>
							@if(!isset($comm->nb_men_2veh))
							pas d'information	
							@else
							{{$comm->nb_men_2veh}}
							@endif

						</b>  
					</li>

					<li class="list-group-item justify-content-between "> 
						Nombre de voiture par ménage
						<b>
							@if(!isset($comm->nb_voit_men))
							pas d'information	
							@else
							{{$comm->nb_voit_men}}
							@endif

						</b>  
					</li>
					<li class="list-group-item justify-content-between "> 
						Evolution sur les 5 dernières années
						<b>
							@if(!isset($comm->evolution_5))
							pas d'information	
							@else
							{{$comm->evolution_5}}
							@endif

						</b>  
					</li>

				</ul>
				
			</div>
		</div>
	</div>
</div>


<div class="col-md-12">
	<div class="card">
		<div class="card-block">
			<div class="row">
				<div class="col-md-6">
					
					
					<h3 class="card-title">Plan de déplacements urbains</h3>
					<ul class="list-group">
						<li class="list-group-item justify-content-between"> 
							Territoire concerné par un PDU
							<b>
								@if(!isset($comm->territoire_pdu))
								pas d'information	
								@else
								{{$comm->territoire_pdu}}
								@endif

							</b>  
						</li>
						<li class="list-group-item justify-content-between"> 
							Lien vers le serveur : accès aux documents
							<b>
								@foreach($lienGs as $lienG)
								@if($lienG->nom=="lien_serveur_pdu")
								<a href="{{$lienG->lien}}" target="_blank">
									<b>Cliquez ici</b>
								</a>
								@endif
								@endforeach
							</b> 
						</li>
					</ul>
				</div>
				<div class="col-md-6">
					<h3 class="card-title">Plan de protection de l'atmosphère</h3>
					<ul class="list-group">
						<li class="list-group-item justify-content-between"> 
							Territoire concerné par un PPA
							<b>
								@if(!isset($comm->territoire_ppa))
								pas d'information	
								@else
								{{$comm->territoire_ppa}}
								@endif

							</b>  
						</li>
						<li class="list-group-item justify-content-between"> 
							Lien vers le serveur : accès aux documents
							<b>
								@foreach($lienGs as $lienG)
								@if($lienG->nom=="lien_serveur_ppa")
								<a href="{{$lienG->lien}}" target="_blank">
									<b>Cliquez ici</b>
								</a>
								@endif
								@endforeach
							</b> 
						</li>
						
					</ul>
				</div>			
			</div>
			<br>
			<div class="row">
				<div class="col-md-6">
					<h3 class="card-title">Plan d'exposition au bruit</h3>
					<ul class="list-group">
						<li class="list-group-item justify-content-between"> 
							Territoire concerné par un PEB
							<b>
								@if(!isset($comm->territoire_peb))
								pas d'information	
								@else
								{{$comm->territoire_peb}}
								@endif

							</b>  
						</li>
						<li class="list-group-item justify-content-between"> 
							Lien vers le serveur : accès aux documents
							<b>
								@foreach($lienGs as $lienG)
								@if($lienG->nom=="lien_serveur_peb")
								<a href="{{$lienG->lien}}" target="_blank">
									<b>Cliquez ici</b>
								</a>
								@endif
								@endforeach
							</b> 
						</li>
						
					</ul>
					<br>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">			
					<h3 class="card-title">Plan Cilmat Air Energie Territorial </h3>
					<ul class="list-group">
						@if (!empty($pcaets->first()))
						@foreach($pcaets as $pcaet)
						<li class="list-group-item justify-content-between "> 
							Correspondant de la DDT (PCAET)   
							<b>{{$pcaet->correspondant_ddt}}<br></b>
						</li>
						@if (isset($pcaet->correspondant2_ddt))
						<li class="list-group-item justify-content-between "> 
							Autre correspondant de la DDT (PCAET)   
							<b>{{$pcaet->correspondant2_ddt}}<br></b>
						</li>
						@endif
						<li class="list-group-item justify-content-between "> 
							Etat d'avancement 
							<b>{{$pcaet->etat_avancement_demarche}}<br></b>
						</li>
						<li class="list-group-item justify-content-between "> 
							Type PCAET
							<b>{{$pcaet->type_pcaet}}<br></b>
						</li>
						<li class="list-group-item justify-content-between "> 
							Nom 
							<b>{{$pcaet->nom_pcaet}} (Donnée MaJ {{$pcaet->annee_maj}})<br></b>
						</li>
						

						@endforeach
						@else
						<li class="list-group-item justify-content-between "> 
							<b>Pas de PCAET répertorié<br></b>
						</li>
						@endif
					</ul>

				</div>
			</div>
		</div>
		
		
	</div>
</div>

<div class="col-md-12">
	<div class="card">
		<div class="card-block">
			<h3 class="card-title">TEPOS ou PEPCV (échelle EPCI)</h3>
			<ul class="list-group">
				@if (!empty($tepospepcvs->first()))
				@foreach($tepospepcvs as $tepospepcv)

				<li class="list-group-item justify-content-between "> 
					Nom 
					<b>{{$tepospepcv->nom_tepospepcv}}(Donnée MaJ {{$tepospepcv->annee_maj}})<br></b>
				</li>
				<li class="list-group-item justify-content-between "> 
					Tepos ou pepcv 
					<b>{{$tepospepcv->tepos_ou_pepcv}}<br></b>
				</li>
				<br>
				@endforeach
				@else
				<li class="list-group-item justify-content-between "> &nbsp;
					<b>Pas de TEPOS ou PEPCV pour l'EPCI incluant cette commune</b>
				</li>
				@endif
			</ul>
		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="card">
		<div class="card-block">
			<h3 class="card-title">Plate-formes de rénovation énergétique (échelle EPCI)</h3>
			<ul class="list-group">
				@if (!empty($pfres->first()))
				@foreach($pfres as $pfre)

				<li class="list-group-item justify-content-between "> 
					Nom 
					<b>{{$pfre->nom_pfre}}(Donnée MaJ {{$pfre->annee_maj}})<br></b>
				</li>
				<br>
				@endforeach
				@else
				<li class="list-group-item justify-content-between "> &nbsp;
					<b>Pas de PFRE pour l'EPCI incluant cette commune</b>
				</li>
				@endif
			</ul>
		</div>
	</div>
</div>



<div class="col-md-12">
	<div class="card" id="troncon">
		<div class="card-block">
			<h3 class="card-title">Tronçons et routes</h3>
			@if (!empty($troncons->first()))
			<table class="table">
				<thead class="thead-default">
					<tr>

						<th>Route ou tronçon</th>
						<th>Type</th>
						<th>Catégorie de nuisance sonore</th>
						<th>MaJ Donnée</th>
					</tr>
				</thead>
				<tbody>

					@foreach($troncons as $troncon)
					<tr>

						<td>{{$troncon->nom_numero_voie}}</td>
						<td>{{$troncon->type}}</td>
						<td>{{$troncon->categorie_nuisonore}}</td>
						<td>{{$troncon->annee_maj}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@else
			<ul class="list-group">	
				<li class="list-group-item justify-content-between "> &nbsp;
					<b>Pas de tronçon pour l'EPCI incluant cette commune</b>
				</li>	
			</ul>
			@endif
		</div>
	</div>
</div>



<div class="col-md-12">
	<div class="card" id="lien7">
		<div class="card-block">
			<h3 class="card-title"><i class="glyphicon glyphicon-link"></i>Liens utiles</h3>
			<ul class="list-group">
				@foreach($lien_theme7s as $lien_theme7)
				<li class="list-group-item justify-content-between ">{{$lien_theme7->libelle}} :
					<a href="{{$lien_theme7->lien}}" target="_blank" style="max-width: 90%;" >
						<b>Cliquez ici <br></b>
					</a>
				</li>	
				@endforeach

			</ul>

		</div>
	</div>
</div>




