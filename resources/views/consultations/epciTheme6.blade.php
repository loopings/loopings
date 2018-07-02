<div class="col-md-12">	
	<div class="row">
		<div class="col-md-6">		
			<h3 class="card-title">Statistiques agricoles</h3>
			<ul class="list-group">
				<li class="list-group-item justify-content-between">
					Recensement agricole 2010 -fiche EPCI
					<b>
						@if(!isset($epci->recensement_agri_2010))
						pas d'information	
						@else
						{{$epci->recensement_agri_2010}}
						@endif
					</b>
				</li>
			</ul>
		</div>

		<div class="col-md-6">
			<h3 class="card-title">Pastoralisme</h3>
			<ul class="list-group">
				<li class="list-group-item justify-content-between">
					Rendu de l'enquête pastorale 2014/2015 sur le territoire
					<b>
						@foreach($lienGs as $lienG)
						@if($lienG->nom=="enquete_pastorale_20142015")
						{{$lienG->lien}}
						@endif
						@endforeach
					</b>
				</li>
			</ul>
		</div>
	</div>
	<br>
	<h3 class="card-title">Production sous signes de qualité</h3>
	<ul class="list-group">
		<li class="list-group-item justify-content-between">
			Liste des AOC/AOP présents sur l'EPCI
			<b>
				@if (!empty($aocaops->first()))	

				@foreach($aocaops as $aocaop)
				{{$aocaop->nom_aocaop}}({{$aocaop->annee_maj}})<br>
				@endforeach
				@else
				Pas AOC/AOP sur cet EPCI
				@endif
			</b>
		</li>
	</ul>
</div>

<div class="col-md-12">	
	<h3 class="card-title">Cultures déclarées </h3>
	<ul class="list-group">
		<li class="list-group-item justify-content-between">
			Année
			<b>
				@if(!isset($epci->culture_decl_année))
				pas d'information	
				@else
				{{$epci->culture_decl_année}}
				@endif
			</b>
		</li>
		<li class="list-group-item justify-content-between">
			Tableau: surface des groupes principaux de culture/pourcentage bio
			<b>
				@if(!isset($epci->tab_group_cult_bio))
				pas d'information	
				@else
				{{$epci->tab_group_cult_bio}}
				@endif
				
			</b>
		</li>
		<li class="list-group-item justify-content-between">
			Lien vers carte de l'occupation agricole et tissu urbain
			<b>
				@if(!isset($epci->carte_occup_agrico))
				pas d'information	
				@else
				{{$epci->carte_occup_agrico}}
				@endif
				
			</b>
		</li>
	</ul>
</div>

<div class="col-md-12">
	<div class="card" id="maet">
		<div class="card-block">
			<h3 class="card-title">Mesures agro-environnementales territorialisées(MAET) </h3>
			
			<ul class="list-group">
				<li class="list-group-item justify-content-between "> 
					Cartographie
					<b>
						@foreach($lienGs as $lienG)
						@if($lienG->nom=="carte_maet")
						<a href="{{$lienG->lien}}" target="_blank">
							<b>Cliquez ici</b>
						</a>
						@endif
						@endforeach
					</b>
				</li>
				

				<li class="list-group-item justify-content-between "> 
					Nom :  
					<b> 
						@if (!empty($maets->first()))	

						@foreach($maets as $maet)
						{{$maet->nom_maet}}({{$maet->annee_maj}})<br>
						@endforeach
						@else
						Pas MAET sur cet EPCI
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
				@foreach($lien_theme6s as $lien_theme6)
					<li class="list-group-item justify-content-between ">{{$lien_theme6->libelle}} :
						<a href="{{$lien_theme6->lien}}" target="_blank" style="max-width: 90%;" >
							<b>Cliquez ici <br></b>
						</a>
					</li>	
					@endforeach
			</ul>

		</div>
	</div>
</div>