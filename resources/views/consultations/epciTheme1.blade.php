<div class="col-md-12">

	<div class="row">
		

		<div class="col-md-6 d-flex align-items-stretch">	
			<div class="card">
				<div class="card-block">
					<h3 class="card-title">
						<i class="glyphicon glyphicon-info-sign">
						</i>
						Informations générales
					</h3>
					<ul class="list-group">
						<li class="list-group-item justify-content-between ">Type <b>{{$epci->type_epci}}</b>  
						</li>
						<li class="list-group-item justify-content-between">Code SIREN   
							<b >{{$epci->code_siren}}</b>
						</li>
						<li class="list-group-item justify-content-between">Surface de l'EPCI 
							<b >{{$epci->surface_epci}}</b> 
						</li>
						<li class="list-group-item justify-content-between">Président
							<b >{{$epci->civilite}}&nbsp;{{$epci->prenom_president}}&nbsp;{{$epci->nom_president}}</b> 
						</li>
						<li class="list-group-item justify-content-between">Adresse siège <b>{{$epci->adresse_siege}}</b>
						</li>
						<li class="list-group-item justify-content-between">Téléphone <b>{{$epci->tel}}</b>
						</li>
						<li class="list-group-item justify-content-between">Fax 
							<b>{{$epci->fax}}</b>
						</li>
						<li class="list-group-item justify-content-between">Email
							<b>{{$epci->courriel}}</b>
						</li>
						<li class="list-group-item justify-content-between">Site internet <b>{{$epci->site_internet}}</b>
						</li>
						<li class="list-group-item justify-content-between">Population 
							<b>
								@foreach($populations as $population)
								<i>Année {{$population->annee}} : &nbsp;&nbsp;   </i> {{$population->population}} habitants<br>
								@endforeach
							</b>
						</li>
						
					</ul>
					<br>
					<h3 class="card-title">
						Schéma de Cohérence
					</h3>
					<ul class="list-group">
						<li class="list-group-item justify-content-between">
							SCOT
							<b>
								@foreach($scots as $scot)
								{{$scot->nom_scot}}<br>
								@endforeach
							</b>
						</li>
					</ul>
				</div>
			</div>
		</div>


		<div class="col-md-6 d-flex align-items-stretch">
			<div class="card">
				<div class="card-block">
					<h3 class="card-title"><i class="glyphicon glyphicon-king"></i> Liste des communes de L'EPCI (Clickable)
					</h3>
					<ul class="list-group">
						<div class="row">
							
						@foreach($comms as $comm)
						<li class="list-group-item text-center d-inline-block justify-content-between col-md-3">
						<a href="{{route('communeC', ['id' => $comm->id])}}" target="_blank">
										<b>{{$comm->nom_comm}}</b>
									</a>
						</li>
						@endforeach
						</div>
					</ul>
				</div>
			</div>
		</div>

	</div>
</div>

<div class="col-md-12">
	<div class="card">
		<div class="card-block">
			<h3 class="card-title"><i class="glyphicon glyphicon-link"></i>Liens utiles</h3>
			<ul class="list-group">
				
				@foreach($lien_theme1s as $lien_theme1)
							<li class="list-group-item justify-content-between ">{{$lien_theme1->libelle}} 
								<a href="{{$lien_theme1->lien}}" target="_blank" style="max-width: 90%;" >
									<b>
										Cliquez ici
										<br>
									</b>
								</a>
							</li>	
							@endforeach

				
			</ul>

		</div>
	</div>
</div>

		

