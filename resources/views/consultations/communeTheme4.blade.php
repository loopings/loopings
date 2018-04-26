<!--scrollspy affix-->
<div style="position:fixed;">
	<ul class="nav nav-pills flex-column" >

		@if (!empty($barrages->first()))
		<li class="nav-item" >
			<a class="nav-link " href="#barrages"  style="width: 140px;background-color:#f0f5ff;"><br>Barrages</a>
		</li>
		@endif

		@if (!empty($cfs->first()))
		<li class="nav-item">
			<a class="nav-link" href="#cf" style="width: 140px;margin-top: 20px;background-color:#f0f5ff;"><br>Chartes forestières</a>
		</li>
		@endif

		@if (!empty($crs->first()))
		<li class="nav-item">
			<a class="nav-link" href="#cr" style="width: 140px;margin-top: 20px;background-color:#f0f5ff;"><br>Contrats rivères</a>
		</li>
		@endif

		@if (!empty($digues->first()))
		<li class="nav-item" >
			<a class="nav-link" href="#digues" style="width: 140px;margin-top: 20px;background-color:#f0f5ff;"><br>Digues</a>
		</li>
		@endif


		@if (!empty($sages->first()))
		<li class="nav-item">
			<a class="nav-link" href="#sage" style="width: 140px;margin-top: 20px;background-color:#f0f5ff;"><br>SAGE</a>
		</li>
		@endif

		@if (!empty($steps->first()))
		<li class="nav-item">
			<a class="nav-link" href="#step" style="width: 140px;margin-top: 20px;background-color:#f0f5ff;"><br>STEP</a>
		</li>
		@endif

		<li class="nav-item">
			<a class="nav-link" href="#lien4" style="width: 140px;margin-top: 20px;background-color:#f0f5ff;"><br>Liens utiles</a>
		</li>

	</ul> 
</div>


@if (!empty($barrages->first()))

<div class="col-md-9 offset-md-2">
	<div class="card" id="barrages">
		<div class="card-block">
			<h3 class="card-title">Barrages </h3>
			@foreach($barrages as $barrage)
			<ul class="list-group">

				<li class="list-group-item justify-content-between "> 
					Nom :  
					<b>{{$barrage->nom_barrage}}<br></b>
				</li>
				<li class="list-group-item justify-content-between "> 
					Type :  
					<b>{{$barrage->type_barrage}}<br></b>
				</li>
				<li class="list-group-item justify-content-between "> 
					Nom gestionnaire :
					<b>{{$barrage->nom_gestionnaire}}<br></b>
				</li>
				<li class="list-group-item justify-content-between "> 
					Type gestionnaire :
					<b>{{$barrage->type_gestionnaire}}<br></b>
				</li>

			</ul>
			<br>
			@endforeach
		</div>
	</div>
</div>

@endif

@if (!empty($cfs->first()))

<div class="col-md-9 offset-md-2">
	<div class="card" id="cf">
		<div class="card-block">
			<h3 class="card-title">Chartes forestières </h3>
			@foreach($cfs as $cf)
			<ul class="list-group">

				<li class="list-group-item justify-content-between "> 
					Nom :  
					<b>{{$cf->nom_chforest}}<br></b>
				</li>


			</ul>
			<br>
			@endforeach
		</div>
	</div>
</div>

@endif


@if (!empty($crs->first()))

<div class="col-md-9 offset-md-2">
	<div class="card" id="cr">
		<div class="card-block">
			<h3 class="card-title">Contrats rivières </h3>
			@foreach($crs as $cr)
			<ul class="list-group">

				<li class="list-group-item justify-content-between "> 
					Nom :  
					<b>{{$cr->nom_contrat}}<br></b>
				</li>
				<li class="list-group-item justify-content-between "> 
					Type :  
					<b>{{$cr->type_contrat}}<br></b>
				</li>


			</ul>
			<br>
			@endforeach
		</div>
	</div>
</div>

@endif

@if (!empty($digues->first()))

<div class="col-md-9 offset-md-2">
	<div class="card" id="digues">
		<div class="card-block">
			<h3 class="card-title">Digues </h3>
			@foreach($digues as $digue)
			<ul class="list-group">

				<li class="list-group-item justify-content-between "> 
					Nom bassin versant :  
					<b>{{$digue->nom_bassinversant}}<br></b>
				</li>
				<li class="list-group-item justify-content-between "> 
					Nom rivière :  
					<b>{{$digue->nom_riviere}}<br></b>
				</li>
				<li class="list-group-item justify-content-between "> 
					Rive protégée :  
					<b>{{$digue->rive_protegee}}<br></b>
				</li>

				<li class="list-group-item justify-content-between "> 
					Nom gestionnaire :
					<b>{{$digue->nom_gestionnaire}}<br></b>
				</li>
				<li class="list-group-item justify-content-between "> 
					Type gestionnaire :
					<b>{{$digue->type_gestionnaire}}<br></b>
				</li>
				<li class="list-group-item justify-content-between "> 
					Proprietaire :
					<b>{{$digue->proprietaire}}<br></b>
				</li>
				<li class="list-group-item justify-content-between "> 
					Type proprietaire :
					<b>{{$digue->type_proprietaire}}<br></b>
				</li>
			</ul>
			<br>
			@endforeach
		</div>
	</div>
</div>

@endif




@if (!empty($sages->first()))

<div class="col-md-9 offset-md-2">
	<div class="card" id="sage">
		<div class="card-block">
			<h3 class="card-title">Schéma d'Aménagement de Gestion des Eaux </h3>
			@foreach($sages as $sage)
			<ul class="list-group">

				<li class="list-group-item justify-content-between "> 
					Nom  :  
					<b>{{$sage->nom_sage}}<br></b>
				</li>
				<li class="list-group-item justify-content-between "> 
					Lien fiche descriptive :  
					<a href="{{$sage->lien_gesteau}}" target="_blank" >
						<b>cliquez ici<br></b>
					</a>
				</li>

			</ul>
			<br>
			@endforeach
		</div>
	</div>
</div>

@endif


@if (!empty($steps->first()))

<div class="col-md-9 offset-md-2">
	<div class="card" id="step">
		<div class="card-block">
			<h3 class="card-title">Stations d'Epuration des eaux usées STEP </h3>
			@foreach($steps as $step)
			<ul class="list-group">

				<li class="list-group-item justify-content-between "> 
					Nom STEP :  
					<b>{{$step->nom_step}}<br></b>
				</li>
				<li class="list-group-item justify-content-between "> 
					Etat technique:  
					<b>{{$step->etat}}<br></b>
				</li>
				<li class="list-group-item justify-content-between "> 
					Capacité de traitement :  
					<b>{{$step->capacite}}<br></b>
				</li>

				<li class="list-group-item justify-content-between "> 
					Conformité de la capacité :
					<b>{{$step->conformite_capacite}}<br></b>
				</li>
				<li class="list-group-item justify-content-between "> 
					Conformité de l'équipement :
					<b>{{$step->conformite_equipement}}<br></b>
				</li>
				
			</ul>
			<br>
			@endforeach
		</div>
	</div>
</div>

@endif


<div class="col-md-9 offset-md-2">
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