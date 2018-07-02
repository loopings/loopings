<div class="col-md-12">	
	<h3 class="card-title">Déplacements domicile-travail Dernières données disponibles ()</h3>
	<ul class="list-group">
		<li class="list-group-item justify-content-between">
			Nombre d'emplois localisés sur le territoire
			<b>
				@if(!isset($epci->nb_emploi_terri))
				pas d'information	
				@else
				{{$epci->nb_emploi_terri}}
				@endif
				
			</b>
		</li>
		<li class="list-group-item justify-content-between">
			Actifs résidents travaillant sur le territoire
			<b>
				@if(!isset($epci->actif_res_tr_terri))
				pas d'information	
				@else
				{{$epci->actif_res_tr_terri}}
				@endif
			</b>
		</li>
		<li class="list-group-item justify-content-between">
			Actifs résidents travaillant hors du territoire
			<b>
				@if(!isset($epci->actif_res_tr_horsterri))
				pas d'information	
				@else
				{{$epci->actif_res_tr_horsterri}}
				@endif
			</b>
		</li>

		<li class="list-group-item justify-content-between">
			Vulnérabilité énergétique aux déplacements
			<b>
				@if(!isset($epci->vulnerabilite_energetique))
				pas d'information	
				@else
				{{$epci->vulnerabilite_energetique}}
				@endif
			</b>
		</li>
	</ul>
</div>


<div class="col-md-12">	
	<div class="card">
		<div class="card-block">
			<h3 class="card-title">Motorisation des ménages dernières données disponible (?? pas de date) </h3>
			<ul class="list-group">
				<li class="list-group-item justify-content-between "> 
					Nombre de ménages
					<b>
						@if(!isset($commune_men->nb_men_tot))
						pas d'information	
						@else
						{{$commune_men->nb_men_tot}}
						@endif

					</b>  
				</li>
				<li class="list-group-item justify-content-between "> 
					Ménage possédant au moins un véhicule
					<b>
						@if(!isset($commune_men->nb_men_1veh))
						pas d'information	
						@else
						{{$commune_men->nb_men_1veh}}
						@endif

					</b>  
				</li>
				<li class="list-group-item justify-content-between "> 
					Ménage possédant deux véhicules et plus
					<b>
						@if(!isset($commune_men->nb_men_2veh))
						pas d'information	
						@else
						{{$commune_men->nb_men_2veh}}
						@endif

					</b>  
				</li>

				<li class="list-group-item justify-content-between "> 
					Nombre de voiture par ménage
					<b>
						@if(!isset($commune_men->nb_voit_men))
						pas d'information	
						@else
						{{$commune_men->nb_voit_men}}
						@endif

					</b>  
				</li>
				<li class="list-group-item justify-content-between "> 
					Evolution sur les 5 dernières années
					<b>
						(comment faire info dispo sur l'échelle communale uniquement)
					</b>  
				</li>

			</ul>
			
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
							Territoire concerné par un PDU ou partiellemnt
							<b>
								@if (!empty($comm_pdu->first()))	
								Oui
								@else
								Non
								@endif

							</b>  
						</li>
						<li class="list-group-item justify-content-between"> 
							Lien vers le serveur : accès aux documents
							<b>
								@foreach($lienGs as $lienG)
								@if($lienG->nom=="lien_serveur")
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
							Territoire concerné par un PPA ou partiellemnt
							<b>
								@if (!empty($comm_ppa->first()))	
								Oui
								@else
								Non
								@endif
							</b>  
						</li>
						<li class="list-group-item justify-content-between"> 
							Lien vers le serveur : accès aux documents
							<b>
								@foreach($lienGs as $lienG)
								@if($lienG->nom=="lien_serveur")
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
			
			<div class="col-md-6">
				<h3 class="card-title">Plan d'exposition au bruit</h3>
				<ul class="list-group">
					<li class="list-group-item justify-content-between"> 
						Territoire concerné par un PEB ou partiellemnt
						<b>
							@if (!empty($comm_peb->first()))	
							Oui
							@else
							Non
							@endif

						</b>  
					</li>
					<li class="list-group-item justify-content-between"> 
						Lien vers le serveur : accès aux documents
						<b>
							@foreach($lienGs as $lienG)
							@if($lienG->nom=="lien_serveur")
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
						Nom 
						<b>{{$pcaet->nom_pcaet}}({{$pcaet->annee_maj}})<br></b>
					</li>
					<li class="list-group-item justify-content-between "> 
						Type PCAET
						<b>{{$pcaet->type_pcaet}}<br></b>
					</li>
					<br>
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


<div class="col-md-12">
	<div class="card">
		<div class="card-block">
			<h3 class="card-title">Territoire concerné par un TEPOS ou un TEPCV</h3>
			<ul class="list-group">
				@if (!empty($tepospepcvs->first()))
				@foreach($tepospepcvs as $tepospepcv)

				<li class="list-group-item justify-content-between "> 
					Nom 
					<b>{{$tepospepcv->nom_tepospepcv}}({{$tepospepcv->annee_maj}})<br></b>
				</li>
				<li class="list-group-item justify-content-between "> 
					Tepos ou pepcv 
					<b>{{$tepospepcv->tepos_ou_pepcv}}<br></b>
				</li>
				<br>
				@endforeach
				@else
				<li class="list-group-item justify-content-between "> 
					<b>Pas de TEPOS ou PEPCV pour l'EPCI <br></b>
				</li>
				@endif
			</ul>
		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="card">
		<div class="card-block">
			<h3 class="card-title">Plate-formes de rénovation énergétique</h3>
			<ul class="list-group">
				@if (!empty($pfres->first()))
				@foreach($pfres as $pfre)

				<li class="list-group-item justify-content-between "> 
					Nom 
					<b>{{$pfre->nom_pfre}}(Année de mise à jour de la donnée{{$pfre->annee_maj}})<br></b>
				</li>
				<br>
				@endforeach
				@else
				<li class="list-group-item justify-content-between "> 
					<b>Pas de PFRE pour l'EPCI<br></b>
				</li>
				@endif
			</ul>
		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="card">
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