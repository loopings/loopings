<div class="col-md-12">
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-block">
					<h3 class="card-title"> Urbanisme</h3>
					<ul class="list-group">
						<li class="list-group-item justify-content-between ">Chargé de planification <b>@if(!empty($cham)) {{$cham->prenom_cham}}&nbsp;{{$cham->nom_cham}} @endif</b>  </li>

						@if(!empty($cham2)) 
						<li class="list-group-item justify-content-between ">Deuxième chargé de planification <b>{{$cham2->prenom_cham}}&nbsp;{{$cham2->nom_cham}} </b>  </li>
						@endif

						<li class="list-group-item justify-content-between ">Présence d'une DTA<br> <b>
							@if(!empty($dta)) {{$dta->nom_dta}}&nbsp;(Année de mise à jour {{$dta->annee_maj}}) 
							@else
							Pas de DTA
						@endif </b>  </li>

						<li class="list-group-item justify-content-between ">SCOT  <b>@if(!empty($scot)){{$scot->nom_scot}}
							@else
							Non
						@endif</b>  
					</li>



					<li class="list-group-item justify-content-between ">et comprenant des dispositions opposables  <b>
						@if(!isset($comm->disposition_opposable))
						pas d'information	
						@else
						@if($comm->disposition_opposable)Oui
						@else Non
						@endif

					@endif</b>  
				</li>

				<li class="list-group-item justify-content-between ">Document d'urbanisme opposable  <b>
					@if(!isset($comm->doc_urba_opposable))
					pas d'information	
					@else
					{{$comm->disposition_opposable}}

				@endif</b>  
			</li>

			<li class="list-group-item justify-content-between ">Date du dernier document opposable  <b>
				@if(!isset($comm->date_dern_doc_opposable))
				pas d'information	
				@else
				{{$comm->date_dern_doc_opposable}}

			@endif</b>  
		</li>
		<li class="list-group-item justify-content-between "> 
			Procédure en cours
			<b>
				@foreach($lienGs as $lienG)
				@if($lienG->nom=="procedure_en_cours")
				<a href="{{$lienG->lien}}" target="_blank">
					<b>Cliquez ici</b>
				</a>
				@endif
				@endforeach
			</b>
		</li>	
		<li class="list-group-item justify-content-between "> 
			Liste des SUP de la commune
			<b>
				@foreach($lienGs as $lienG)
				@if($lienG->nom=="liste_sup")
				<a href="{{$lienG->lien}}" target="_blank">
					<b>Cliquez ici</b>
				</a>
				@endif
				@endforeach
			</b>
		</li>
		<li class="list-group-item justify-content-between ">Taxe d'aménagement  <b>
			@if(!isset($comm->tx_amenagement))
			pas d'information	
			@else
			{{$comm->tx_amenagement}}

		@endif</b>  
	</li>
	<li class="list-group-item justify-content-between ">Compétence urbanisme  <b>
		@if(!isset($comm->competence_urba))
		pas d'information	
		@else
		{{$comm->competence_urba}}

	@endif</b>  
</li>
<li class="list-group-item justify-content-between ">Dernier document opposable numérisé  <b>
	@if(!isset($comm->dern_doc_oppo_num))
	pas d'information	
	@else
	{{$comm->dern_doc_oppo_num}}

@endif</b>  
</li>	
<li class="list-group-item justify-content-between "> 
	Mesures de restrictions à l'urbanisation <br>pour assainissement insuffisant
	<b>
		@foreach($lienGs as $lienG)
		@if($lienG->nom=="mesure_restrictions")
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
</div>



<div class="col-md-6">
	<div class="card">
		<div class="card-block">
			
			@if(!empty($ze))
			<h3 class="card-title"> 
				Zones d'emplois
			</h3>
			<ul class="list-group">
				<li class="list-group-item justify-content-between ">Libellé 
					<b>

						{{$ze->libelle_ze}} (Année de mise à jour {{$ze->annee_maj}})
						

					</b>  
				</li>
			</ul>
			<br>
			@endif

			@if(!empty($au))
			<h3 class="card-title"> 
				Aires urbaines
			</h3>
			<ul class="list-group">
				<li class="list-group-item justify-content-between ">typologie 
					<b>
						{{$au->typologie}} (Année de mise à jour {{$au->annee_maj}})
					</b>  
				</li>
				<li class="list-group-item justify-content-between ">Libellé de la ville centre 
					<b>
						{{$au->libelle_ville_centre}}
					</b>  
				</li>
			</ul>
			<br>
			@endif
			@if(!empty($uu))
			<h3 class="card-title"> 
				Unités urbaines
			</h3>
			<ul class="list-group">
				<li class="list-group-item justify-content-between ">Libellé de l'unité 
					<b>
						{{$uu->libelle_uu}} (Année de mise à jour {{$uu->annee_maj}})
					</b>  
				</li>
				<li class="list-group-item justify-content-between ">Population 
					<b>
						{{$uu->population}}
					</b>  
				</li>
			</ul>
			@endif


		</div>

	</div>


	@if(!empty($comm->lien_bddreal))

	<div class="card">
		<div class="card-block">
			<h3 class="card-title"> ICPE
			</h3>
			<ul class="list-group">			
				<li class="list-group-item justify-content-between ">Lien BD DREAL 
					<a href="{{$comm->lien_bddreal}}" target="_blank" style="max-width: 90%;" >
						<b>
							Cliquez ici 
							<br>
						</b>
					</a>
				</li>				
			</ul>
		</div>
	</div>

	@endif

</div>
</div>
</div>



<div class="col-md-12">
	<div class="card">
		<div class="card-block">
			<h3 class="card-title"> Prévention des risques
			</h3>
			<ul class="list-group">
				<li class="list-group-item justify-content-between ">Responsable de la cellule affichage des risques <b>@if(!empty($cham)) {{$agent_car->prenom_car}}&nbsp;{{$agent_car->nom_car}} @endif</b>  
				</li>

				@if(!empty($agent_car2)) 
				<li class="list-group-item justify-content-between ">Deuxième chargé de planification <b>{{$agent_car2->prenom_car}}&nbsp;{{$agent_car2->nom_car}} </b>  
				</li>
				@endif

				<li class="list-group-item justify-content-between ">
					Lien vers le planning des priorités 
					<b>
						@foreach($lienGs as $lienG)
						@if($lienG->nom=="lien_planning_priorités_risques")
						<a href="{{$lienG->lien}}" target="_blank">
							<b>Cliquez ici</b>
						</a>
						@endif
						@endforeach
					</b> 
				</li>

				<li class="list-group-item justify-content-between ">
					Lien vers la base de données "Risques" - intranet DDT
					<b>
						@foreach($lienGs as $lienG)
						@if($lienG->nom=="lien_bd_risques")
						<a href="{{$lienG->lien}}" target="_blank">
							<b>Cliquez ici</b>
						</a>
						@endif
						@endforeach
					</b> 
				</li>
				<li class="list-group-item justify-content-between ">
					Accès aux documents liés à la réglementation des zonages -Réseau<br>(certains documents ne sont accessibles qu'au format papier) 
					<b>
						@foreach($lienGs as $lienG)
						@if($lienG->nom=="documents_lies_reglementation_zonages")
						{{$lienG->lien}}
						@endif
						@endforeach
					</b> 
				</li>
				<li class="list-group-item justify-content-between "> Commune concernée par un TRI 
					<b>
						@if(!isset($comm->tri))
						pas d'information	
						@else
						{{$comm->tri}}
						@endif

					</b>  
				</li>
				<li class="list-group-item justify-content-between "> Existence d'une stratégie locale de gestion du risque inondation SLGRI approuvée 
					<b>
						@if(!isset($comm->slgri))
						pas d'information	
						@else
						{{$comm->slgri}}
						@endif

					</b>  
				</li>

			</ul>
		</div>
	</div>
</div>


<div class="col-md-12">
	<div class="card">
		<div class="card-block">
			<h3 class="card-title"> 
				Zones dites "loi montagne" ne pas confondre avec les zones de handicap naturel (agriculture)
			</h3>
			<ul class="list-group">
				<li class="list-group-item justify-content-between "> Classement en zone Montagne 
					<b>
						@if(!isset($comm->class_zonemontagne))
						pas d'information	
						@else
						{{$comm->class_zonemontagne}}
						@endif

					</b>  
				</li>
				@if(isset($comm->liste_hameaux))
				<li class="list-group-item justify-content-between "> Si la commune est pariellementen zone montagne<br>Les hameaux classés( dernier ajout en 1982)
					<b>
						{{$comm->liste_hameaux}}
					</b>  
				</li>
				@endif

				<li class="list-group-item justify-content-between ">
					Lien carte loi montagne 
					<b>
						@foreach($lienGs as $lienG)
						@if($lienG->nom=="carte_loi_montagne")
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
</div>


<div class="col-md-12">
	<div class="row ">
		<div class="col-md-6">
			<div class="card">
				<div class="card-block">
					<h3 class="card-title"> 
						Espace boisé réglementé
					</h3>
					<ul class="list-group">
						<li class="list-group-item justify-content-between "> Commune concernée par une réglementation de boisement
							<b>
								@if(!isset($comm->existence_reg_bois))
								pas d'information	
								@else
								{{$comm->existence_reg_bois}}
								@endif

							</b>  
						</li>

						<li class="list-group-item justify-content-between ">
							Information sur les périmètres
							<b>
								@foreach($lienGs as $lienG)
								@if($lienG->nom=="info_perimetre")
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
		</div>



		<div class="col-md-6">
			<div class="card">
				<div class="card-block">
					<h3 class="card-title"> 
						Zonage patrimonial
					</h3>

					<ul class="list-group">
						@if (!empty($zps->first()))
						@foreach($zps as $zp)

						<li class="list-group-item justify-content-between "> 
							Site patrimonial remarquable
							<b>{{$zp->site_patri_remarq}} (Année de mise à jour {{$zp->annee_maj}}) <br></b>
						</li> <br>
						@endforeach
						@else
						<li class="list-group-item justify-content-between "> 
							Pas de Site Patrimonial Remarquable sur la commune
						</li>
						@endif	
					</ul>
				</div>
			</div>
		</div>

	</div>
</div>

<div class="col-md-12">
	<div class="card" id="lien">
		<div class="card-block">
			<h3 class="card-title"><i class="glyphicon glyphicon-link"></i>Liens utiles</h3>
			<ul class="list-group">

				@if(!empty($comm->lien_synth_risques))
				<li class="list-group-item justify-content-between ">Accès au site Géorisques - zoom à la commune 
					<a href="{{$comm->lien_synth_risques}}" target="_blank" style="max-width: 90%;" >
						<b>Cliquez ici <br></b>
					</a>
				</li>
				@endif

				@foreach($lien_theme3s as $lien_theme3)
				<li class="list-group-item justify-content-between ">{{$lien_theme3->libelle}} 
					<a href="{{$lien_theme3->lien}}" target="_blank" style="max-width: 90%;" >
						<b>Cliquez ici <br></b>
					</a>
				</li>	
				@endforeach
			</ul>
		</div>
	</div>
</div>