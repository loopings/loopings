
<!--scrollspy affix-->
<div style="position:fixed;">
	<ul class="nav nav-pills flex-column" >

		@if (!empty($appbs->first()))
		<li class="nav-item" >
			<a class="nav-link " href="#appb"  style="width: 140px;background-color:#f0f5ff;"><br>APPB</a>
		</li>
		@endif

		@if (!empty($natura2000s->first()))
		<li class="nav-item">
			<a class="nav-link" href="#natura2000" style="width: 140px;margin-top: 20px;background-color:#f0f5ff;"><br>Natura 2000</a>
		</li>
		@endif

		@if (!empty($znieffs->first()))
		<li class="nav-item" >
			<a class="nav-link" href="#znieff" style="width: 140px;margin-top: 20px;background-color:#f0f5ff;"><br>ZNIEFF</a>
		</li>
		@endif

		@if(!empty($pnr)) 
		<li class="nav-item">
			<a class="nav-link" href="#pnr" style="width: 140px;margin-top: 20px;background-color:#f0f5ff;"><br>PNR</a>
		</li>
		@endif


		<li class="nav-item">
			<a class="nav-link" href="#lien" style="width: 140px;margin-top: 20px;background-color:#f0f5ff;"><br>Liens utiles</a>
		</li>

	</ul> 
</div>


<div class="col-md-9 offset-md-2">
	<div class="card" id="appb">
		<div class="card-block">
			<h3 class="card-title">Espace réglementairement protégé (voir BD communale DREAL pour plus de détails)  </h3>


			<ul class="list-group">

				@if (!empty($appbs->first()))
				@foreach($appbs as $appb)
				<li class="list-group-item justify-content-between "> 
					Nom
					<b>{{$appb->nom_appb}}<br></b>
				</li>

				<li class="list-group-item justify-content-between ">
					Etat 
					<b>{{$appb->surface}}<br></b> 
				</li>

				<li class="list-group-item justify-content-between ">
					Année de mise à jour de la donnée
					<b>{{$appb->annee_maj}}<br></b>

				</li>
				@endforeach
				@else
				<li class="list-group-item justify-content-between "> 
					Pas d'APPB sur la commune 
				</li>
				@endif
			</ul>
			<br>

			<ul class="list-group">

				@if (!empty($reserves->first()))
				@foreach($reserves as $reserve)
				<li class="list-group-item justify-content-between "> 
					Nom
					<b>{{$reserve->nom_reserve}}<br></b>
				</li>


				<li class="list-group-item justify-content-between ">
					Année de mise à jour de la donnée
					<b>{{$reserve->annee_maj}}<br></b>

				</li>
				@endforeach
				@else
				<li class="list-group-item justify-content-between "> 
					Pas de réserve sur la commune 
				</li>
				@endif
			</ul>
			<br>
		</div>
	</div>
</div>




<div class="col-md-9 offset-md-2">
	<div class="card" id="natura2000">
		<div class="card-block">
			<h3 class="card-title">Zones Natura 2000 </h3>
			@if (!empty($natura2000s->first()))
			@foreach($natura2000s as $natura2000)			
			<ul class="list-group">


				<li class="list-group-item justify-content-between "> 
					Nom
					<b>{{$natura2000->nom_natura2000}}<br></b>
				</li>


				<li class="list-group-item justify-content-between ">
					Année de mise à jour de la donnée
					<b>{{$natura2000->annee_maj}}<br></b>

				</li>



			</ul><br>
			@endforeach
			@else
			<ul class="list-group">

				<li class="list-group-item justify-content-between "> 
					Pas de Natura 2000 sur la commune 
				</li>
			</ul>
			
			@endif
		</div>
	</div>
</div>


<div class="col-md-9 offset-md-2">
	<div class="card" id="ens">
		<div class="card-block">
			<h3 class="card-title">Espaces naturels sensibles gérés par le CD 38 </h3>		
			<ul class="list-group">
				<li class="list-group-item justify-content-between "> 
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
			</ul><br>


		</div>
	</div>
</div>



<div class="col-md-9 offset-md-2">
	<div class="card" id="znieff">
		<div class="card-block">
			<h3 class="card-title">Zones Naturelles d'Interêt Ecologique Faunistique et Floristique (ZNIEFF) de type 1 (voir BD communale DREAL pour plus de détails)  </h3>
			
@if (!empty($znieffs->first()))
	@foreach($znieffs as $znieff)
		
			<ul class="list-group">

				<li class="list-group-item justify-content-between "> 
					Nom 
					<b>{{$znieff->nom_znieff}}<br></b>
				</li>
				<li class="list-group-item justify-content-between "> 
					Année de mise à jour de la donnée 
					<b>{{$znieff->annee_maj}}<br></b>
				</li>


			</ul>
			<br>
			@endforeach
			@else
			<ul class="list-group">

				<li class="list-group-item justify-content-between "> 
					Pas de ZNIEFF de type 1 sur la commune 
				</li>
			</ul>
			
			@endif

		</div>
	</div>
</div>



<div class="col-md-9 offset-md-2">
	<div class="card" id="pnr">
		<div class="card-block">
			<h3 class="card-title">Parc naturels régionaux (PNR) </h3>
@if (!empty($pnr))
		
			<ul class="list-group">

				<li class="list-group-item justify-content-between "> 
					Nom
					<b>{{$pnr->nom_pnr}}<br></b>
				</li>
				<li class="list-group-item justify-content-between "> 
					Année de mise à jour de la donnée  
					<b>{{$pnr->annee_maj}}<br></b>
				</li>


			</ul>
			<br>
			@else
			<ul class="list-group">

				<li class="list-group-item justify-content-between "> 
					Pas de PNR sur la commune 
				</li>
			</ul>
			
			@endif

		</div>
	</div>
</div>



<div class="col-md-9 offset-md-2">
	<div class="card" id="lien">
		<div class="card-block">
			<h3 class="card-title"><i class="glyphicon glyphicon-link"></i>Liens utiles</h3>
			<ul class="list-group">
				@if(!empty($comm->lien_bddreal))
							<li class="list-group-item justify-content-between ">Lien BD DREAL 
								<a href="{{$comm->lien_bddreal}}" target="_blank" style="max-width: 90%;" >
									<b>
										Cliquez ici 
										<br>
									</b>
								</a>
							</li>
							@endif
				@foreach($lien_theme2s as $lien_theme2)
				<li class="list-group-item justify-content-between ">{{$lien_theme2->libelle}} 
					<a href="{{$lien_theme2->lien}}" target="_blank" style="max-width: 90%;" >
						<b>Cliquez ici <br></b>
					</a>
				</li>	
				@endforeach


			</ul>
		</div>
	</div>
</div>
