
<div class="col-md-12">
	<div class="card">
		<div class="card-block">
			
			<div class="row">
				<div class="col-md-6">
					<h3 class="card-title" style="margin-bottom: 50px;">
						Espace réglementaire protégé (APPB,réserve,...) voir BD communale DREAL pour plus de détails                                                                  
					</h3>
					<ul class="list-group">
						<li class="list-group-item justify-content-between"> 
							Lien vers la carte de l'observatoire
							<b>
								@foreach($lienGs as $lienG)
								@if($lienG->nom=="epci_carte_observatoire_espace_reg_protege")
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
						Zones Naturelles d'intêret Ecologique Faunistique er Floristique ZNIEFF voir BD communale DREAL pour plus de détails
					</h3>
					<ul class="list-group">
						<li class="list-group-item justify-content-between"> 
							Lien vers la carte de l'observatoire
							<b>
								@foreach($lienGs as $lienG)
								@if($lienG->nom=="epci_carte_observatoire_znieff")
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
			<br>
			<div class="row">
				<div class="col-md-6">
					<h3 class="card-title" style="margin-bottom: 50px;">
						Espace naturel sensible géré par le CD 38
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
						Zones Natura 2000, voir BD communale DREAL pour plus de détails
					</h3>
					<ul class="list-group">
						<li class="list-group-item justify-content-between"> 
							Lien vers la carte de l'observatoire
							<b>
								@foreach($lienGs as $lienG)
								@if($lienG->nom=="epci_carte_observatoire_natura2000")
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
			<br><br>
			<h3 class="card-title">
				Parcs naturels régionaux
			</h3>
			<ul class="list-group">
				@if (!empty($pnrs->first()))
				@foreach($pnrs as $pnr)

				<li class="list-group-item justify-content-between "> 
					Nom 
					<b>{{$pnr->nom_pnr}}(Donnée MaJ {{$pnr->annee_maj}})</b>
				</li>
				<br>
				@endforeach
				@else
				<li class="list-group-item justify-content-between ">&nbsp;
					<b class="text-right">Pas de PNR sur cet EPCI</b>
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