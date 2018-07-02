<div class="col-md-12">	
	<h3 class="card-title">Planification( à revoir manque toutes les infos concernant les plhi</h3>
	<ul class="list-group">
		<li class="list-group-item justify-content-between">
			EPCI concerné par un PLHi
			<b>
				@if(!isset($epci->libelle_plhi))
				pas d'information	
				@else
				{{$epci->libelle_plhi}}
				@endif
			</b>
		</li>
		<li class="list-group-item justify-content-between">
			Commune toutistique R.133-42 du code du tourisme ou "station classée de tourisme"
			@if(!empty($comm_tourists->first()))
			<b>
				<ul class="list-group col-md-12">
					
					<div class="row ">	
						@foreach($comm_tourists as $comm_tourist)
						<li class="list-group-item text-center d-inline-block justify-content-between col-md-4">
							<a href="{{route('communeC', ['id' => $comm_tourist->id])}}" target="_blank">
								<b>{{$comm_tourist->nom_comm}}</b>
							</a>
						</li>
						@endforeach
						
					</div>

				</ul>

			</b>

			@else
			<b>
				Aucune commune touristique sur cet EPCI
			</b>
			@endif
		</li>
		
	</ul>
</div>
<br>
<div class="col-md-12">
	<div class="card" id="lgmts">
		<div class="card-block">
			<h3 class="card-title">Logements </h3>
			
			<table class="table">
				<thead class="thead-default">
					<tr>

						<th style="vertical-align:text-top;">Année </th>
						<th style="vertical-align:text-top;">Total  </th>
						<th style="vertical-align:text-top;"> Résidences principales(dont construites avant 1975)</th>
						<th style="vertical-align:text-top;">Résidences secondaires   </th>
						<th style="vertical-align:text-top;"> Logements vacants    </th>
						<th style="vertical-align:text-top;">Maisons </th>
						<th style="vertical-align:text-top;">Appartements  </th>
						<th style="vertical-align:text-top;">Logements sociaux </th>
					</tr>
				</thead>
				<tbody>
					
					@foreach($logements as $logement) 
					<tr>

						<td> {{$logement->annee}}   </td>
						<td> {{$logement->total_lgmts}}  </td>
						<td> {{$logement->resid_princ}}({{$logement->res_princ_av_75}})  </td>
						<td> {{$logement->resid_second}}  </td>
						<td> {{$logement->lgmts_vacants}}  </td>
						<td> {{$logement->maisons}}  </td>
						<td> {{$logement->appartements}}  </td>
						<td> {{$logement->lgmts_sociaux}}  </td>
					</tr>
					@endforeach

					
				</tbody>
			</table>
			<br>	
			<ul class="list-group">
				<li class="list-group-item justify-content-between">
					Vulnérabilité énergétique au logement
					<b>
						@if(!isset($epci->vulnerabilite_ener_log))
						pas d'information	
						@else
						{{$epci->vulnerabilite_ener_log}}
						@endif	
					</b>
				</li>
				<li class="list-group-item justify-content-between">
					Copropriétés dégradées ou fragiles 
					<b>
						@if(!isset($epci->coproprio_deg_frag))
						pas d'information	
						@else
						{{$epci->coproprio_deg_frag}}
						@endif
					</b>
				</li>

			</ul>
		</div>
	</div>
</div>


<div class="col-md-12">	
	<h3 class="card-title">Politique de la ville</h3>
	<ul class="list-group">
		<li class="list-group-item justify-content-between">
			Nombre de quartier prioritaire
			<b>
				@if(!isset($epci->nb_quart_prio))
				pas d'information	
				@else
				{{$epci->nb_quart_prio}}
				@endif
			</b>
		</li>
		<li class="list-group-item justify-content-between">
			Nombre d'habitants résidant dans les quartiers prioritaires du territoire
			<b>
				@if(!isset($epci->nb_hab_quart_prio))
				pas d'information	
				@else
				{{$epci->nb_hab_quart_prio}}
				@endif
			</b>
		</li>
		<li class="list-group-item justify-content-between">
			Liste des quartiers prioritaires
			<b>
				@foreach($lienGs as $lienG)
				@if($lienG->nom=="liste_quartiers_prioritaires")
				{{$lienG->lien}}
				@endif
				@endforeach
			</b>
		</li>

	</ul>
</div>
<br>
<div class="col-md-12">
	<div class="card">
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


