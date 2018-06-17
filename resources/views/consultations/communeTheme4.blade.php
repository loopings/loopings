<!--scrollspy affix-->
<div style="position:fixed;">
	<ul class="nav nav-pills flex-column" >

		<li class="nav-item">
			<a class="nav-link" href="#lien4" style="width: 140px;margin-top: 20px;background-color:#f0f5ff;"><br>Liens utiles</a>
		</li>

	</ul> 
</div>



<div class="col-md-10 offset-md-2">
	<div class="card">
		<div class="card-block">
			<h3 class="card-title"> Milieux</h3>
			<ul class="list-group">
				<li class="list-group-item justify-content-between "> 
					Contact à la DDT chargé de la police des eaux et ouvrage soumis à la police de l'eau
					<b>{{$cheau->nom_cheau}}({{$cheau->annee_maj}})<br></b>
				</li>
				<li class="list-group-item justify-content-between "> 
					Contact à la DDT pour l'hydroélectricité
					<b>{{$hydroelec->nom_hydroelec}}({{$hydroelec->annee_maj}})<br></b>
				</li>
				<li class="list-group-item justify-content-between "> 
					Contact à la DDT sur les questions écologiques
					<b>{{$conteco->nom_conteco}}({{$conteco->annee_maj}})<br></b>
				</li>
				<li class="list-group-item justify-content-between "> 
					Contact à la DDT pour les digues et barrages
					<b>{{$contdigba->nom_contdigba}}({{$contdigba->annee_maj}})<br></b>
				</li>
				<li class="list-group-item justify-content-between "> 
					Commune concernée par la zone nitrate
					<b>
						@if(!isset($comm->zone_nitrate))
						pas d'information	
						@else
						{{$comm->zone_nitrate}}
						@endif

					</b>  
				</li>
				<li class="list-group-item justify-content-between "> 
					Commune concernée par l'aire d'alimentation d'un captage prioritaire
					<b>
						@if(!isset($comm->captage_prioritaire))
						pas d'information	
						@else
						{{$comm->captage_prioritaire}}
						@endif

					</b>  
				</li>

				<li class="list-group-item justify-content-between "> 
					Présence de captage avec DUP, voir GeoIde eau-ouvrage pour<br> visualiser les périmètres immédiats/rapprochés et éloignés
					@if (!empty($captages->first()))
					<ul>
						@foreach($captages as $captage)
						@if(!empty($captage))
						<li>	
							<b>{{$captage->nom_captage}} {{$captage->dup}}({{$captage->annee_maj}})</b>
							<li>
								@endif
								@endforeach
							</ul>
							@else
							<b>Pas de captage</b>	
							@endif	

						</li>

						<li class="list-group-item justify-content-between "> 
							Présence d'une ressource stratégique pour l'avenir, à prendre<br> en compte dans les documents d'urbanisme(aires à préserver)
							@if (!empty($resstrats->first()))
							<ul>
								@foreach($resstrats as $resstrat)
								@if(!empty($resstrat))
								<li>	
									<b>{{$resstrat->nom_resstrat}}({{$resstrat->annee_maj}})  </b>
									<li>
										@endif
										@endforeach
									</ul>
									@else
									<b>Pas de ressource</b>	
									@endif	

								</li>
								<li class="list-group-item justify-content-between "> 
									Commune concernée par un territoire SDAGE identifié en déficit avéré
									<b>
										@if(!isset($comm->sdage_deficit_aver))
										pas d'information	
										@else
										{{$comm->sdage_deficit_aver}}
										@endif

									</b>  
								</li>
								<li class="list-group-item justify-content-between "> 
									Avec mise en place d'un plan de gestion de la ressource<br> en eau PGRE (doc accessible via site Gest'eau)
									<b>
										@if(!isset($comm->pgre))
										pas d'information	
										@else
										{{$comm->pgre}}
										@endif

									</b>  
								</li>
								<li class="list-group-item justify-content-between "> 
									Commune concernée par un territoire SDAGE identifié en "équilibre fragile"
									<b>
										@if(!isset($comm->sdage_equi_frag))
										pas d'information	
										@else
										{{$comm->sdage_equi_frag}}
										@endif

									</b>  
								</li>
								<li class="list-group-item justify-content-between "> 
									Compétence GEMAPI
									<b>
										@if(empty($gemapi))
										aucune	
										@else
										{{$gemapi->nom_gemapi}}({{$gemapi->annee_maj}})
										@endif

									</b>  
								</li>



							</ul>
						</div>
					</div>
				</div>





				<div class="col-md-10 offset-md-2">
					<div class="card" id="cr">
						<div class="card-block">
							<h3 class="card-title">Contrats de milieux </h3>

							<ul class="list-group">
								@if (!empty($crs->first()))
								@foreach($cms as $cm)
								<li class="list-group-item justify-content-between "> 
									Nom :  
									<b>{{$cm->nom_contrat}}({{$cm->annee_maj}})<br></b>
								</li>

								<br>
								@endforeach
								@else 
								<li class="list-group-item justify-content-between"> 
									<b> Pas de contrat</b>
								</li>
							</ul>
							@endif

							<h3 class="card-title">SAGE </h3>
							<ul class="list-group">
								@if (!empty($sages->first()))
								@foreach($sages as $sage)

								<li class="list-group-item justify-content-between"> 
									Contact à la DDT pour les questions intéressant les SAGE  
									<b>{{$sage->contact1}}</b>
								</li>
								@if(isset($sage->contact2))
								<li class="list-group-item justify-content-between"> 
									Contact 2 à la DDT pour les questions intéressant les SAGE  
									<b>{{$sage->contact2}}</b>
								</li>
								@endif
								<li class="list-group-item justify-content-between"> 
									Nom du SAGE 
									<b>{{$sage->nom_sage}}({{$sage->annee_maj}})</b>
								</li>
								<li class="list-group-item justify-content-between"> 
									Lien fiche descriptive  
									<a href="{{$sage->lien_gesteau}}" target="_blank">
										<b>cliquez ici</b>
									</a>
								</li>
								<br>
								@endforeach
								@else 
								<li class="list-group-item justify-content-between" >
									<b> Pas de SAGE sur la commune</b>
								</li>
								@endif
							</ul>
						</div>
					</div>
				</div>





				<div class="col-md-10 offset-md-2">
					<div class="card" id="cr">
						<div class="card-block">
							<h3 class="card-title">Eau potable </h3>


							@if (!empty($colcompeaups->first()))
							<ul class="list-group">
								
								<li class="list-group-item justify-content-between "> 
									Collectivité compétente en distribution d'eau potable-distribution   
									@foreach($colcompeaups as $colcompeaup)
									<ul>
										<li>
											<b>{{$colcompeaup->nom_colcompeaup}}({{$colcompeaup->annee_maj}})<br></b>
										</li>	
									</ul>
									@endforeach
								</li>
								<br>
								
							</ul>
							
							
							@endif

							@if (!empty($colgesteaups->first()))
							<ul class="list-group">

								<li class="list-group-item justify-content-between "> 
									Collectivité(s) gestionnaire d'eau potable-distribution 
									@foreach($colgesteaups as $colgesteaup)
									<ul>
										<li>  
											<b>{{$colgesteaup->nom_colgesteaup}} ({{$colgesteaup->annee_maj}})<br></b>
										</li>	
									</ul>
									@endforeach
								</li>
								<br>			
							</ul>
							@endif

						</div>
					</div>
				</div>

				<div class="col-md-10 offset-md-2">
					<div class="card" id="cr">
						<div class="card-block">
							<h3 class="card-title">Assainissement </h3>

							<ul class="list-group">
								@if (!empty($colcompeauus->first()))

								
								<li class="list-group-item justify-content-between "> 
									Collectivité compétente en traintement des eaux usées
									@foreach($colcompeauus as $colcompeauu)
									<ul>
										<li>
											<b>{{$colcompeauu->nom_colcompeauu}}({{$colcompeauu->annee_maj}})<br></b>
										</li>	
									</ul>
									@endforeach
								</li>
								<br>
								



								@endif

								@if (!empty($colgestasss->first()))

								<li class="list-group-item justify-content-between "> 
									Collectivité(s) gestionnaire d'eau potable-distribution 
									@foreach($colgestasss as $colgestass)
									<ul>
										<li>  
											<b>{{$colgestass->nom_colgestass}} ({{$colgestass->annee_maj}})<br></b>
										</li>	
									</ul>
									@endforeach
								</li>
								<br>			

								@endif

								@foreach($steps as $step)
								<li class="list-group-item justify-content-between "> 
									Nom de la STEP présente sur la commune   
									<b>{{$step->nom_step}}<br></b>
								</li>

								<!--	
								<li class="list-group-item justify-content-between "> 
									Code SANDRE  
									<b>{{$step->nom_step}}<br></b>
								</li>
							-->
							<li class="list-group-item justify-content-between "> 
								Commune rattachés à la STEP (voir carte)  
								<b>
									@foreach($lienGs as $lienG)
									@if($lienG->nom=="commune_rattaches")
									<a href="{{$lienG->lien}}" target="_blank">
										<b>Cliquez ici</b>
									</a>
									@endif
									@endforeach
								</b>
							</li>

							<li class="list-group-item justify-content-between "> 
								Capacité de traitement 
								<b>{{$step->capacite}}<br></b>
							</li>

							<li class="list-group-item justify-content-between "> 
								Niveau de priorité en matière de restriction :  
								<b>{{$step->niveau_priorite}}<br></b>
							</li>

							<li class="list-group-item justify-content-between "> 
								Date(s) des courriers préfectoraux de notification de restriction
								<b>{{$step->date_courrier}}<br></b>
							</li>
							<li class="list-group-item justify-content-between "> 
								Mise en demeure 
								<b>{{$step->mise_en_demeure}}<br></b>
							</li>
							<li class="list-group-item justify-content-between "> 
								Année de mise en oeuvre 
								<b>{{$step->annee_mis_en_dem}}<br></b>
							</li>
							<br>
							@endforeach
							<li class="list-group-item justify-content-between "> 
								Bibliothèque des schémas directeurs d'assainissement    
								<b>
									@foreach($lienGs as $lienG)
									@if($lienG->nom=="b_schémas_assainissement")
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

			<div class="col-md-10 offset-md-2">
				<div class="card" id="cf">
					<div class="card-block">
						<h3 class="card-title">FORET </h3>


						
						<ul class="list-group">
							@if (!empty($cfs->first()))
							@foreach($cfs as $cf)
							<li class="list-group-item justify-content-between "> 
								Nom de la charte forestière

								<b>{{$cf->nom_charte}}({{$cf->annee_maj}})<br></b>
							</li>
							<li class="list-group-item justify-content-between "> 
								Démarche en cours

								<b>{{$cf->demarche_en_cours}}<br></b>
							</li>
							<br>
							@endforeach
						@else
						<li class="list-group-item justify-content-between "> 
								<b>Pas de charte forestière pour la commune<br></b>
							</li>
						@endif
						<li class="list-group-item justify-content-between "> 
									Taux de boisement communal(pourcentage)
									<b>
										@if(!isset($comm->tx_bois))
										pas d'information	
										@else
										{{$comm->tx_bois}}
										@endif

									</b>  
								</li>

						</ul>
						
						
					</div>
				</div>
			</div>


			

			<div class="col-md-10 offset-md-2">
				<div class="card" id="lien4">
					<div class="card-block">
						<h3 class="card-title"><i class="glyphicon glyphicon-link"></i>Liens utiles</h3>
						<ul class="list-group">
							@foreach($lien_theme4s as $lien_theme4)
							<li class="list-group-item justify-content-between ">{{$lien_theme4->libelle}} :
								<a href="{{$lien_theme4->lien}}" target="_blank" style="max-width: 90%;" >
									<b>Cliquez ici <br></b>
								</a>
							</li>	
							@endforeach



						</ul>
					</div>
				</div>
			</div>