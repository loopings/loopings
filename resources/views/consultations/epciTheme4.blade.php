<div class="col-md-12">
	<div class="card">
		<div class="card-block">
			<h3 class="card-title">Milieux</h3>
			<ul class="list-group">
				<li class="list-group-item justify-content-between">
					Présence d'une ressource stratégique pour l'avenir, à prendre en compte dans les documents d'urbanisme (aires à préserver) 
					<b>
						@if (!empty($resstrats->first()))
						@foreach($resstrats as $resstrat)
						{{$resstrat->nom_resstrat}} (Donnée MaJ {{$resstrat->annee_maj}} )
						@endforeach
						@else
						Non
						@endif
						
					</b>
				</li>
				<li class="list-group-item justify-content-between">
					Territoire concerné par un territoire du SDAGE identifié en déficit avéré
					<b>
						@if (!empty($sdage_deficits->first()))	
						Oui
						@else
						Non
						@endif
					</b>
				</li>
				<li class="list-group-item justify-content-between">
					Avec mise en place d'un plan de gestion de la ressource en eau PGRE(doc accessible via site Gest'eau) 
					<b>
						@if (!empty($pgres->first()))	
						Oui
						@else
						Non
						@endif
					</b>
				</li>
				<li class="list-group-item justify-content-between">
					Commune concernée par un territoire du SDAGE identifié "en équilibre fragile" 
					<b>
						@if (!empty($sdage_equis->first()))	
						Oui
						@else
						Non
						@endif
					</b>
				</li>
				<li class="list-group-item justify-content-between">
					Compétence GEMAPI
					<b>
						@if (!empty($gemapis->first()))	
						
						@foreach($gemapis as $gemapi)
						{{$gemapi->nom_gemapi}}(Donnée MaJ {{$gemapi->annee_maj}})<br>
						@endforeach
						@else
						Non
						@endif
					</b>
				</li>
			</ul>
			
		</div>
		<br>
		<div class="col-md-12">
			<div class="card-block">
				<h3 class="card-title">Contrats de milieu</h3>
				<ul class="list-group">
					<li class="list-group-item justify-content-between">
						Contact à la DDT pour la question <br>intéressant les contrats de milieux 
						
						<b>
							@if (!empty($contactcms->first()))	
							
							@foreach($contactcms as $contactcm)
							{{$contactcm->nom_contactcm}}(Donnée MaJ {{$contactcm->annee_maj}})<br>
							@endforeach
							@else
							Pas d'information
							@endif
						</b>						
					</li>
					<li class="list-group-item justify-content-between">
						Nom 
						<b>
							@if (!empty($cms->first()))
							@foreach($cms as $cm)
							{{$cm->nom_contrat}} (Donnée MaJ {{$cm->annee_maj}})<br>
							@endforeach
							@else
							Non
							@endif
						</b>
					</li>
					<li class="list-group-item justify-content-between">
						Carte des contrats de milieux
						<b>
							@foreach($lienGs as $lienG)
							@if($lienG->nom=="carte_contrats_milieux")
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
</div>

<div class="col-md-12">
	<div class="card">
		<div class="card-block">
			<h3 class="card-title">SAGE</h3>
			
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
					<b>{{$sage->nom_sage}}(Donnée MaJ{{$sage->annee_maj}})</b>
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
					<b> Aucun SAGE pour les communes inclues dans l'EPCI</b>
				</li>
				@endif
			</ul>
		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="card">
		<div class="row">	
			<div class="col-md-6">
				<div class="card-block">	
					<h3 class="card-title">Assainissement</h3>
					<ul class="list-group">
						
						<li class="list-group-item justify-content-between">
							EPCI compétente en traitement des eaux usées
							<b>
								@if(!isset($epci->competence_concernee))
								pas d'information	
								@else
								{{$epci->competence_concernee}}
								@endif
								
							</b>
						</li>
						<li class="list-group-item">
							Services gestionnaires de la dépollution des eaux usées
							<b class="text-left">
								@if (!empty($colgestasss->first()))	
								
								@foreach($colgestasss as $colgestass)
								{{$colgestass->nom_colgestass}}(Donnée Maj {{$colgestass->annee_maj}})<br>
								@endforeach
								@else
								Aucun service
								@endif
								
							</b>
						</li>
						<li class="list-group-item justify-content-between">
							Lien vers la bibliothèque des<br>schémas directeur d'assainissement
							<b>
								@foreach($lienGs as $lienG)
								@if($lienG->nom=="bibliotheque_schemas_directeur_assainissement")
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
			
			<div class="col-md-6">
				<div class="card-block">	
					<h3 class="card-title">Eau potable</h3>
					<ul class="list-group">
						<li class="list-group-item justify-content-between">
							EPCI compétente AEP -distribution
							<b>
								@if(!isset($epci->aep))
								pas d'information	
								@else
								{{$epci->aep}}
								@endif
								
							</b>
						</li>
						<li class="list-group-item justify-content-between">
							Services gestionnaires de l'eau potable -distribution
							<b class="text-left">
								@if (!empty($colgesteaups->first()))	
								
								@foreach($colgesteaups as $colgesteaup)
								{{$colgesteaup->nom_colgesteaup}}(Donnée Maj {{$colgesteaup->annee_maj}})<br>
								@endforeach
								@else
								Aucun service
								@endif
							</b>
						</li>
						
						
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="col-md-12">	
	<div class="card">
		<div class="card-block">	
			<h3 class="card-title">Zone vulnérable aux nitrates</h3>
			<ul class="list-group">
				<li class="list-group-item justify-content-between">
					Territoire concerné entièrement ou partiellement par la zone nitrate
					<b>
						@if(!isset($epci->zone_nitrate))
						pas d'information	
						@else
						{{$epci->zone_nitrate}}
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
			<h3 class="card-title">Chartes foresières</h3>
			<ul class="list-group">
				<li class="list-group-item justify-content-between">
					Territoire concerné par une charte forestière
					@if (!empty($cfs->first()))
					
					<table class="table">
						<thead class="thead-default">
							<tr>
								<th style="vertical-align:text-top;">Nom charte  </th>
								<th style="vertical-align:text-top;">Démarche en cours</th>
								<th style="vertical-align:text-top;">Année de MaJ </th>
							</tr>
						</thead>
						<tbody>
							
							@foreach($cfs as $cf) 
							<tr>
								<td class="text-left"> {{$cf->nom_charte}}  </td>
								<td class="text-left"> {{$cf->demarche_en_cours}}  </td>
								<td> {{$cf->annee_maj}}  </td>
							</tr>
							@endforeach
							
							
						</tbody>
					</table>
					@else
					<b>
						Non
					</b>
					@endif
				</li>
				<li class="list-group-item justify-content-between">
					Existence d'une règlementation de boisements
					<b>
						@if (!empty($existence_reg_boiss->first()))	
						Oui
						@else
						Non
						@endif
						
					</b>
				</li>
				<li class="list-group-item justify-content-between">
					Existence d'une forêt de protection
					<b>
						@if (!empty($existence_for_prots->first()))	
						Oui
						@else
						Non
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