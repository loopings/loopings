
<div class="col-md-12">
	<div class="card">
		<div class="card-block">
			
			<div class="row">
				<div class="col-md-6">
					<h3 class="card-title">
						Espace réglementaire protégé (APPB,réserve,...) voir BD communale DREAL pour plus de détail 
					</h3>
					<ul class="list-group">
						<li class="list-group-item justify-content-between"> 
							Lien vers la carte de l'observatoire
							<b>
								@foreach($lienGs as $lienG)
								@if($lienG->nom=="epci_carte_observatoire")
								<a href="{{$lienG->lien}}" target="_blank">
									<b>Cliquez ici</b>
								</a>
								@endif
								@endforeach
							</b> 
						</li>
					</ul>
				</div>

				<div class="col-md-6">
					<h3 class="card-title">
						Zones Naturelles d'intêret Ecologique Faunistique er Floristique ZNIEFF voir BD communale DREAL
					</h3>
					<ul class="list-group">
						<li class="list-group-item justify-content-between"> 
							Lien vers la carte de l'observatoire
							<b>
								@foreach($lienGs as $lienG)
								@if($lienG->nom=="epci_carte_observatoire")
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
			<br>

			<div class="row">
				<div class="col-md-6">
					<h3 class="card-title">
						Espace naturel sensible gérés par le CD 38
					</h3>
					<ul class="list-group">
						<li class="list-group-item justify-content-between"> 
							Lien vers le site du conseil départemental
							<b>
								@foreach($lienGs as $lienG)
								@if($lienG->nom=="conseil_departemental")
								<a href="{{$lienG->lien}}" target="_blank">
									<b>Cliquez ici</b>
								</a>
								@endif
								@endforeach
							</b> 
						</li>
					</ul>
				</div>

				<div class="col-md-6">
					<h3 class="card-title">
						Zones Natura 2000, voir BD communale DREAL
					</h3>
					<ul class="list-group">
						<li class="list-group-item justify-content-between"> 
							Lien vers la carte de l'observatoire
							<b>
								@foreach($lienGs as $lienG)
								@if($lienG->nom=="epci_carte_observatoire")
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
			<br>
			<h3 class="card-title">
				Parc naturels régionaux
			</h3>
			<ul class="list-group">
				@if (!empty($pnrs->first()))
				@foreach($pnrs as $pnr)

				<li class="list-group-item justify-content-between "> 
					Nom 
					<b>{{$pnr->nom_pnr}}(Année de mise à jour de la donnée{{$pnr->annee_maj}})<br></b>
				</li>
				<br>
				@endforeach
				@else
				<li class="list-group-item justify-content-between "> 
					<b>Pas de PNR cet EPCI<br></b>
				</li>
				@endif
			</ul>
		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="card">
		<div class="card-block">
			<h3 class="card-title"><i class="glyphicon glyphicon-link"></i>Liens utiles</h3>
			<ul class="list-group">
				@foreach($lien_theme2s as $lien_theme2)
							<li class="list-group-item justify-content-between ">{{$lien_theme2->libelle}} 
								<a href="{{$lien_theme2->lien}}" target="_blank" style="max-width: 90%;" >
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