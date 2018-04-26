<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-block">
				<h3 class="card-title"> Déplacements domicile-travail - dernières données disponibles N-2</h3>
				<ul class="list-group">
					<li class="list-group-item justify-content-between ">Nombre d'actifs total :<b>{{$comm->nb_actifs}}</b>  </li>
					<li class="list-group-item justify-content-between ">Actifs résidents travaillant dans la commune :<b>{{$comm->nb_actifs_restants}}</b>  </li>

					<li class="list-group-item justify-content-between ">Actifs résidents travaillant hors de la commune :<b>{{$comm->nb_actifs_sortants}}</b> 
					</li>


				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-block">
				<h3 class="card-title">Motorisation des ménages  </h3>					<br/><br/>
				<ul class="list-group">
					<li class="list-group-item justify-content-between ">Nombre de ménages :  <b>{{$comm->nb_men_tot}}</b>  </li>

					<li class="list-group-item justify-content-between ">Ménages possédant au moins un véhicule:  <b>{{$comm->nb_men_1veh}}</b>  </li>

					<li class="list-group-item justify-content-between ">Ménages possédant deux véhicules et plus:  <b>{{$comm->nb_men_2veh}}</b>  </li>

				</ul>
			</div>
		</div>
	</div>
</div>


<div class="col-md-12">
	<div class="card" style="max-height: 120px;">
		<div class="card-block">
			<div class="row">

				<div class="col-md-6">
					<ul class="list-group">
						<li class="list-group-item justify-content-between ">Documents employés pour la réglementation de l'urbanisme :<b>{{$comm->docurba}}</b>  </li>
					</ul>
				</div>




				<div class="col-md-6">
					<ul class="list-group">
						<li class="list-group-item justify-content-between ">Numérisation des documents réglementaires d'urbanisme :<b> &nbsp; &nbsp; &nbsp;@if($comm->numer_docurba)Oui @else Non @endif</b>  </li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>



<div class="col-md-12">
	<div class="card">
		<div class="card-block">
			<h3 class="card-title"> Plans de Prévention des Risques(PPR)</h3>
			<div class="row">
				<div class="col-md-6">
					<ul class="list-group">
						<li class="list-group-item justify-content-between ">Application d'un PPR :<b>@if($comm->mise_en_place_ppr)Oui @else Non @endif</b>  </li>
						<li class="list-group-item justify-content-between ">Type de PPR :<b>{{$comm->type_ppr}}</b>  </li>

						<li class="list-group-item justify-content-between ">Prescription d'un PPR Multirisques :<b>@if($comm->prescri_pprm)Oui @else Non @endif</b>  </li>
						<li class="list-group-item justify-content-between ">Prescription d'un PPR Inondation :<b>@if($comm->prescri_ppri)Oui @else Non @endif</b>  </li>
						<li class="list-group-item justify-content-between ">Prescription d'un PPR Technologiques :<b>@if($comm->prescri_pprt)Oui @else Non @endif</b>  </li>
						<li class="list-group-item justify-content-between ">Prescription d'un PPR Miniers :<b>@if($comm->prescri_min)Oui @else Non @endif</b>  </li>
						<li class="list-group-item justify-content-between ">Prescription d'un PPR :<b>@if($comm->prescription)Oui @else Non @endif</b>  </li>


					</ul>
				</div>
				<br>
				<div class="col-md-6">
					<ul class="list-group">
						<li class="list-group-item justify-content-between ">Mise en place d'un document ne valant pas PPR :<b>@if($comm->valant_pas_ppr)Oui @else Non @endif</b>  </li>
						<li class="list-group-item justify-content-between ">Type de document ne valant pas PPR :<b>{{$comm->type_pas_ppr}}</b>  </li>

						<li class="list-group-item justify-content-between ">Existence d'un porté à connaissance pour un PPRN :<b>@if($comm->pac_pprn)Oui @else Non @endif</b>  </li>
						<li class="list-group-item justify-content-between ">Existence d'un porté à connaissance pour un PPRT :<b>@if($comm->pac_pprt)Oui @else Non @endif</b>  </li>
						<li class="list-group-item justify-content-between ">Mise en place d'un document valant PPR :<b>@if($comm->valant_ppr)Oui @else Non @endif</b>  </li>
						<li class="list-group-item justify-content-between ">Type de document valant PPR :<b>{{$comm->type_valant_ppr}}</b>  </li>
						


					</ul>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="col-md-12">
	<div class="card">
		<div class="card-block">
			<h3 class="card-title"> Zones dites "loi Montagne"</h3>
			<div class="row">
				<div class="col-md-6">
					<ul class="list-group">
						<li class="list-group-item justify-content-between ">Classement en zone Montagne :<b>@if($comm->class_zonemontagne)Oui @else Non @endif</b>  </li>

					</ul>
				</div>
				<br>
				<div class="col-md-6">
					<ul class="list-group">
						<li class="list-group-item justify-content-between ">Parties du territoire classés par l'arreté du 20 février 1974 :<b>{{$comm->arrete_20fev1974}}</b>  </li>
					</ul>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-6">
					<ul class="list-group">
						<li class="list-group-item justify-content-between ">Parties du territoire classés par l'arreté du 28 avril 1976 :<b>{{$comm->arrete_28avr1976}}</b>  </li>
					</ul>
				</div>

				<div class="col-md-6">
					<ul class="list-group">
						<li class="list-group-item justify-content-between ">Parties du territoire classés par l'arreté du 29 janvier 1982 :<b>{{$comm->arrete_29janv1982}}</b>  </li>
					</ul>

				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	
	@if(!empty($ze)) 
	<div class="col-md-6 ">
		<div class="card" id="ze">
			<div class="card-block">
				<h3 class="card-title">Zones d'emplois<br />&nbsp;</h3>
				<ul class="list-group">

					<li class="list-group-item justify-content-between "> 
						Libellé :  
						<b>{{$ze->libelle_ze}}<br></b>
					</li>
				</ul>


			</div>
		</div>
	</div>
	@endif

	@if(!empty($dta)) 
	<div class="col-md-6 ">
		<div class="card" id="dta">
			<div class="card-block">
				<h3 class="card-title">Directives Territoriales d'Aménagement(DTA) </h3>
				<ul class="list-group">

					<li class="list-group-item justify-content-between "> 
						Nom :  
						<b>{{$dta->nom_dta}}<br></b>
					</li>


				</ul>


			</div>
		</div>
	</div>

	@endif
</div>

<div class="row">
	
	@if(!empty($au)) 
	<div class="col-md-6 ">
		<div class="card" id="au">
			<div class="card-block">
				<h3 class="card-title">Aires urbaines </h3>
				<ul class="list-group">

					<li class="list-group-item justify-content-between "> 
						Typologie :  
						<b>{{$au->typologie}}<br></b>
					</li>

					<li class="list-group-item justify-content-between ">
						Libellé de la ville centre : 
						<b> {{$au->libelle_ville_centre}} <br></b> 
					</li>
					<li class="list-group-item justify-content-between "><br />&nbsp;</li>
				</ul>


			</div>
		</div>
	</div>
	@endif

	@if(!empty($uu)) 
	<div class="col-md-6 ">
		<div class="card" id="uu">
			<div class="card-block">
				<h3 class="card-title">Unités urbaines </h3>
				<ul class="list-group">

					<li class="list-group-item justify-content-between "> 
						Libellé de l'unité :  
						<b>{{$uu->libelle_uu}}<br></b>
					</li>
					<li class="list-group-item justify-content-between "> 
						Population:  
						<b>{{$uu->code_details}}<br></b>
					</li>
					<li class="list-group-item justify-content-between "> 
						Code géographique :  
						<b>{{$uu->code_geographique}}<br></b>
					</li>


				</ul>


			</div>
		</div>
	</div>

	@endif
</div>



@if (!empty($zps->first()))
<div class="col-md-12 ">
	<div class="card" id="zp">
		<div class="card-block">
			<h3 class="card-title">Zones ZP </h3>
			@foreach($zps as $zp)
			<ul class="list-group">

				<li class="list-group-item justify-content-between "> 
					Arrêté ZPPAUP:  
					<b>@if($zp->arrete_zppaup)Oui @else Non @endif<br></b>
				</li>


				<li class="list-group-item justify-content-between ">
					Date de l'arrêté ZPPAUP : 
					<b>{{date("d-m-Y", strtotime($zp->date_arrete_zppaup))}}<br></b> 
				</li>

				<li class="list-group-item justify-content-between ">
					Déliberation d'une AVAP : 
					<b>@if($zp->deliber_avap)Oui @else Non @endif<br></b> 
				</li>

				<li class="list-group-item justify-content-between ">
					Date de la déliberation AVAP : 
					<b>{{date("d-m-Y", strtotime($zp->date_deliber_avap))}}<br></b> 
				</li>

				<li class="list-group-item justify-content-between ">
					Arrêté AVAP : 
					<b>@if($zp->arrete_avap)Oui @else Non @endif<br></b> 
				</li>

				<li class="list-group-item justify-content-between ">
					Date de l'arrêté AVAP : 
					<b>{{date("d-m-Y", strtotime($zp->date_arrete_avap))}}<br></b> 
				</li>
				<li class="list-group-item justify-content-between ">
					Etude AVAP :					
					<b>{{$zp->etude_avap}}<br></b> 
				</li>

				<li class="list-group-item justify-content-between ">
					Délibération SPR : 
					<b>@if($zp->deliber_spr)Oui @else Non @endif<br></b> 
				</li>
				<li class="list-group-item justify-content-between ">
					Date de la déliberation SPR : 
					<b>{{date("d-m-Y", strtotime($zp->date_deliber_spr))}}<br></b> 
				</li>
				<li class="list-group-item justify-content-between "> 
					Arrêté SPR:  
					<b>@if($zp->arrete_spr)Oui @else Non @endif<br></b>
				</li>


				<li class="list-group-item justify-content-between ">
					Date de l'arrêté SPR : 
					<b>{{date("d-m-Y", strtotime($zp->date_arrete_spr))}}<br></b> 
				</li>

			</ul>
			<br>
			@endforeach
		</div>
	</div>
</div>
@endif
<div class="col-md-12">
	<div class="card" id="lien">
		<div class="card-block">
			<h3 class="card-title"><i class="glyphicon glyphicon-link"></i>Liens utiles</h3>
			<ul class="list-group">

			@if(!empty($comm->lien_synth_risques))
				<li class="list-group-item justify-content-between ">Accès au site Géorisques - zoom à la commune :
				<a href="{{$comm->lien_synth_risques}}" target="_blank" style="max-width: 90%;" >
						<b>Cliquez ici <br></b>
					</a>
				</li>
				@endif

				@foreach($lien_theme3s as $lien_theme3)
				<li class="list-group-item justify-content-between ">{{$lien_theme3->libelle}} :
					<a href="{{$lien_theme3->lien}}" target="_blank" style="max-width: 90%;" >
						<b>Cliquez ici <br></b>
					</a>
				</li>	
				@endforeach



			</ul>
		</div>
	</div>
</div>