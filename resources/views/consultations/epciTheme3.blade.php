
<div class="col-md-12">
	<div class="card">
		<div class="card-block">
			
			<div class="row">
				<div class="col-md-6">
					<h3 class="card-title">
						Urbanisme 
					</h3>
					<ul class="list-group">
						<li class="list-group-item justify-content-between"> 
							Chargé de planification à la DDT
							<b>
								@foreach($lienGs as $lienG)
								@if($lienG->nom=="carte_charge_planif")
								<a href="{{$lienG->lien}}" target="_blank">
									<b>Cliquez ici</b>
								</a>
								@endif
								@endforeach
							</b> 
						</li>
						<li class="list-group-item justify-content-between"> 
							Présence d'une DTA opposable
							<b>
								@if(!isset($epci->dta_opposable))
								pas d'information	
								@else
								@if($epci->dta_opposable)
								Oui
								@else
								Non
								@endif
								@endif
							</b> 
						</li>
						<li class="list-group-item justify-content-between"> 
							Présence de SCOT et territoires avec/sans presciption
							<b>
								@foreach($lienGs as $lienG)
								@if($lienG->nom=="carte_scot_prescription")
								<a href="{{$lienG->lien}}" target="_blank">
									<b>Cliquez ici</b>
								</a>
								@endif
								@endforeach
							</b> 
						</li>
						<li class="list-group-item justify-content-between"> 
							compétence en urbanisme, voir aussi carte de l'état<br> d'avancement des docs urbanisme
							<b>
								@foreach($lienGs as $lienG)
								@if($lienG->nom=="carte_avancement_epci")
								<a href="{{$lienG->lien}}" target="_blank">
									<b>Cliquez ici</b>
								</a>
								@endif
								@endforeach
							</b> 
						</li>
					</ul>
					<br>
					<h3 class="card-title">
						Zones dites "loi montagnes"
					</h3>
					<ul class="list-group">
						<li class="list-group-item justify-content-between"> 
							Classement en zone Montagne
							@if (!empty($zms->first()))	
							<b>
								Des communes inclus dans cet<br> EPCI sont classés en ZM
							</b>
							@else
							<b>
								Aucune commune de l'EPCI n'est<br> classée en ZM
							</b>
							@endif
						</li>
					</ul>
				</div>

				<div class="col-md-6">
					<h3 class="card-title">
						Prévention des risques
					</h3>
					<ul class="list-group">
						<li class="list-group-item justify-content-between"> 
							Contact à la DDT
							<b>
								@foreach($lienGs as $lienG)
								@if($lienG->nom=="carte_contact_ddt")
								<a href="{{$lienG->lien}}" target="_blank">
									<b>Cliquez ici</b>
								</a>
								@endif
								@endforeach
							</b> 
						</li>

						<li class="list-group-item justify-content-between"> 
							Lien vers le planning des priorités
							<b>
								@foreach($lienGs as $lienG)
								@if($lienG->nom=="planning_priorites")
								<a href="{{$lienG->lien}}" target="_blank">
									<b>Cliquez ici</b>
								</a>
								@endif
								@endforeach
							</b> 
						</li>

						<li class="list-group-item justify-content-between"> 
							Lien vers la base de données "Risques" - Intranet DDT
							<b>
								@foreach($lienGs as $lienG)
								@if($lienG->nom=="bd_risques_intranet_ddt")
								<a href="{{$lienG->lien}}" target="_blank">
									<b>Cliquez ici</b>
								</a>
								@endif
								@endforeach
							</b> 
						</li>

						<li class="list-group-item justify-content-between"> 
							Accès aux documents liés à la réglementation<br> des zonages -Réseau (Certains documents ne <br>sont accessibles qu'au format papier)
							<b>
								@foreach($lienGs as $lienG)
								@if($lienG->nom=="réglementation_zonages")
								
								<b>{{$lienG->lien}}</b>
								
								@endif
								@endforeach
							</b> 
						</li>
						<li class="list-group-item justify-content-between"> 
							Territoire concerné par un TRI 
							@if (!empty($tris->first()))

							<b>
								@foreach($tris as $tri)
								@if(!is_null($tri->tri))
								{{$tri->tri}}<br>
								@endif
								@endforeach
							</b>

							@else
							<b>Pas de TRI pour les communes<br> inclus dans cet EPCI</b>
							@endif

						</li>
						<li class="list-group-item justify-content-between"> 
							Existence d'une stratégie<br> locale de gestion du risque
							<br> inondation SLGRi approuvée
							@if (!empty($slgris->first()))

							<b>
								@foreach($slgris as $slgri)
								@if(!is_null($slgri->slgri))
								{{$slgri->slgri}}<br>
								@endif						
								@endforeach
							</b>	
							@else
							<b>Pas de SLGRI pour les communes<br> inclus dans cet EPCI</b>
							@endif
						</li>
					</ul>
				</div>


			</div>
			<br>
			<div class="col-md-12">
				<h3 class="card-title">
					Zonage patrimonial
				</h3>
				<ul class="list-group">

					<li class="list-group-item justify-content-between"> 
						Site Patrimonial remarquable
						<b>
							@foreach($lienGs as $lienG)
							@if($lienG->nom=="carte_site_patrimonial_remarquable")
							<a href="{{$lienG->lien}}" target="_blank">
								<b>Cliquez ici</b>
							</a>
							@endif
							@endforeach
						</b> 
					</li>

					<li class="list-group-item justify-content-between"> 
						Site classés et inscrits
						<b>
							@foreach($lienGs as $lienG)
							@if($lienG->nom=="protection_sites_departementaux")
							<a href="{{$lienG->lien}}" target="_blank">
								<b>Cliquez ici</b>
							</a>
							@endif
							@endforeach

						</b> 
					</li>

					<li class="list-group-item justify-content-between"> 
						Tous les sites y c. les monuments historiques sont répertoriés dans l'atlas régional du patrimoine
						<b>
							@foreach($lienGs as $lienG)
							@if($lienG->nom=="document_expliquant_atlas")
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
			<h3 class="card-title"><i class="glyphicon glyphicon-link"></i>Liens utiles</h3>
			<ul class="list-group">
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