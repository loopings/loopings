
<div class="col-md-12">


	<div class="row">
		

		<div class="col-md-6">	
			<div class="card">
				<div class="card-block">
					<h3 class="card-title">
						<i class="glyphicon glyphicon-info-sign">
						</i>
						Informations générales
					</h3>
					<ul class="list-group">
						<li class="list-group-item justify-content-between ">Code INSEE <b>{{$comm->code_insee}}</b>  
						</li>
						<li class="list-group-item justify-content-between">Surface de la commune(en hectares) :   <b >{{$comm->surface_hectares}}</b>
						</li>
						<li class="list-group-item justify-content-between">Maire : <b >{{$comm->civilite_maire}}&nbsp;{{$comm->prenom_maire}}&nbsp;{{$comm->nom_maire}}</b> 
						</li>
						<li class="list-group-item justify-content-between">Téléphone <b>{{$comm->telephone}}</b> 
						</li>
						<li class="list-group-item justify-content-between">Fax <b>{{$comm->fax}}</b>
						</li>
						<li class="list-group-item justify-content-between">Email <b>{{$comm->email1}} <br>{{$comm->email2}}</b>
						</li>
						<li class="list-group-item justify-content-between">Population 
							<b>
								@foreach($populations as $population)
								<i>Année {{$population->annee}} : &nbsp;&nbsp;   </i> {{$population->population}} habitants<br>
								@endforeach
							</b>
						</li>
						<li class="list-group-item justify-content-between">Fax <b>{{$comm->fax}}</b>
						</li>
					</ul>
				</div>
			</div>
		</div>

		



		<div class="col-md-6">
			<div class="card">
				<div class="card-block">
					<h3 class="card-title"><i class="glyphicon glyphicon-king"></i> Périmètres de gouvernance
					</h3>
					<ul class="list-group">
						<li class="list-group-item justify-content-between ">EPCI <b>
							@if(!empty($epci))
							<a href="{{route('epciC', ['id' => $epci->id])}}" target="_blank">
										<b>{{$epci->nom_groupement}}</b>
									</a>

						@endif</b>  
						</li>

						<li class="list-group-item justify-content-between ">Territoire 38 <b>@if(!empty($terri)) {{$terri->nom_terri38}} @endif</b>  
						</li>

						<li class="list-group-item justify-content-between">Cantons 
							<b>
								@foreach($cantons as $canton)
								{{$canton->nom_canton}}<br>
								@endforeach
							</b>
						</li>
					</ul>
				</div>
			</div>
		</div>

	</div>


</div>

<!--

			<div class="col-md-12">
				<div class="card">
					<div class="card-block">
						<h3 class="card-title"><i class="glyphicon glyphicon-star-empty"></i> Supervision DDT38</h3>
						<ul class="list-group">
							<li class="list-group-item justify-content-between ">Chargé d'aménagement <b>@if(!empty($cham)) {{$cham->prenom_cham}}&nbsp;{{$cham->nom_cham}}&nbsp;&nbsp;&nbsp;{{$cham->serv_am}} @endif</b>  </li>
							<li class="list-group-item justify-content-between ">Agent CAR <b>
								@if(!empty($agent_car)) {{$agent_car->prenom_car}}&nbsp;{{$agent_car->nom_car}}&nbsp;&nbsp;&nbsp;{{$agent_car->zonage_car}} @endif</b>  </li>

								<li class="list-group-item justify-content-between ">SCOT <b>@if(!empty($scot)){{$scot->nom_scot}}@endif</b>  
				</li>
							</ul>
						</div>
					</div>
				</div>

			-->


			<div class="col-md-12">
				<div class="card">
					<div class="card-block">
						<h3 class="card-title">
							<i class="glyphicon glyphicon-link">
								
							</i>
							Liens utiles
						</h3>
						<ul class="list-group">

							@if(!empty($comm->lien_synthavis))
							<li class="list-group-item justify-content-between ">Synthèse des avis :  
								<b>{{$comm->lien_synthavis}}
								</b>  
							</li>
							@endif



							@if(!empty($comm->lien_insee_chiffres))
							<li class="list-group-item justify-content-between ">Lien INSEE chiffres clés 
								<a href="{{$comm->lien_insee_chiffres}}" target="_blank" style="max-width: 90%;" >
									<b>
										Cliquez ici 
										<br>
									</b>
								</a>
							</li>	
							@endif

							@if(!empty($comm->lien_gmaps))
							<li class="list-group-item justify-content-between ">Lien GOOGLE MAPS 
								<a href="{{$comm->lien_gmaps}}" target="_blank" style="max-width: 90%;" >
									<b>
										Cliquez ici 
										<br>
									</b>
								</a>
							</li>
							@endif

							@if(!empty($comm->lien_geoidecarto))
							<li class="list-group-item justify-content-between ">Lien GéoIDE 
								<a href="{{$comm->lien_geoidecarto}}" target="_blank" style="max-width: 90%;" >
									<b>
										Cliquez ici
										<br>
									</b>
								</a>
							</li>
							@endif

							@if(!empty($comm->lien_dossier_complet_insee))
							<li class="list-group-item justify-content-between ">Lien INSEE dossier complet  
								<a href="{{$comm->lien_dossier_complet_insee}}" target="_blank" style="max-width: 90%;" >
									<b>
										Cliquez ici
										<br>
									</b>
								</a>
							</li>	
							@endif

							@if(!empty($comm->lien_admin_francaise))
							<li class="list-group-item justify-content-between ">Site officiel de l’administration Française (Service-Public.fr) 
								<a href="{{$comm->lien_admin_francaise}}" target="_blank" style="max-width: 90%;" >
									<b>
										Cliquez ici
										<br>
									</b>
								</a>
							</li>	
							@endif



							

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
			