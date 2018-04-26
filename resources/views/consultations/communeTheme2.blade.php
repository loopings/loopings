
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

@if (!empty($icpes->first()))
<li class="nav-item">
<a class="nav-link" href="#icpe" style="width: 140px;margin-top: 20px;background-color:#f0f5ff;"><br>ICPE</a>
</li>
@endif

<li class="nav-item">
<a class="nav-link" href="#lien" style="width: 140px;margin-top: 20px;background-color:#f0f5ff;"><br>Liens utiles</a>
</li>

</ul> 
</div>


@if (!empty($appbs->first()))
<div class="col-md-9 offset-md-2">
	<div class="card" id="appb">
		<div class="card-block">
			<h3 class="card-title">Arrêtés de Protection de Biotope (APPB) </h3>
			@foreach($appbs as $appb)
			<ul class="list-group">

				<li class="list-group-item justify-content-between "> 
					Nom : 
					<b>{{$appb->nom_appb}}<br></b>
				</li>


				<li class="list-group-item justify-content-between ">
					Surface en hectares : 
					<b>{{$appb->surface}}<br></b> 
				</li>

				<li class="list-group-item justify-content-between ">
					ID du Muséum National d'Histoire Naturelle
					<b>{{$appb->id_mnhn}}<br></b>

				</li>


				<li class="list-group-item justify-content-between ">Lien CARMEN 1 :
					<a href="{{$appb->lien_carmen1}}" target="_blank" >
						<b>Cliquez ici<br></b>
					</a>
				</li>

				<li class="list-group-item justify-content-between ">Lien CARMEN 2:
					<a href="{{$appb->lien_carmen2}}" target="_blank" style="max-width: 90%;" >
						<b>Cliquez ici <br></b>
					</a>
				</li>						
			</ul>
			<br>
			@endforeach
		</div>
	</div>
</div>
@endif

@if (!empty($natura2000s->first()))
<div class="col-md-9 offset-md-2">
	<div class="card" id="natura2000">
		<div class="card-block">
			<h3 class="card-title">Zones Natura 2000 </h3>
			@foreach($natura2000s as $natura2000)
			<ul class="list-group">

				<li class="list-group-item justify-content-between "> 
					Nom :  
					<b>{{$natura2000->nom_natura2000}}<br></b>
				</li>


				<li class="list-group-item justify-content-between ">
					Type : 
					<b>{{$natura2000->type_natura2000}}<br></b> 
				</li>

				<li class="list-group-item justify-content-between ">
					Surface en hectares : 
					<b>{{$natura2000->surface}}<br></b> 
				</li>
				<li class="list-group-item justify-content-between ">
					Départements sur lesquels s'étend la zone :
					<b>{{$natura2000->departements}}<br></b> 
				</li>

				<li class="list-group-item justify-content-between ">
					ID Service du Patrimoine Naturel : 
					<b>{{$natura2000->id_spn}}<br></b> 
				</li>

				<li class="list-group-item justify-content-between ">Lien CARMEN 1 :
					<a href="{{$natura2000->lien_carmen1}}" target="_blank">
						<b>Cliquez ici<br></b>
					</a>
				</li>



			</ul>
			<br>
			@endforeach
		</div>
	</div>
</div>
@endif


@if (!empty($znieffs->first()))
<div class="col-md-9 offset-md-2">
	<div class="card" id="znieff">
		<div class="card-block">
			<h3 class="card-title">Zones Naturelles d'Interêt Ecologique Faunistique et Floristique (ZNIEFF) </h3>
			@foreach($znieffs as $znieff)
			<ul class="list-group">

				<li class="list-group-item justify-content-between "> 
					Nom :  
					<b>{{$znieff->nom_znieff}}<br></b>
				</li>


				<li class="list-group-item justify-content-between ">
					Type : 
					<b>{{$znieff->type_znieff}}<br></b> 
				</li>

				<li class="list-group-item justify-content-between ">
					Surface en hectares : 
					<b>{{(int)$znieff->surface}}<br></b> 
				</li>
				<li class="list-group-item justify-content-between ">Fiche descriptive :
					<a href="{{$znieff->lien_carmen1}}" target="_blank">
						<b>Cliquez ici<br></b>
					</a>
				</li>
				<li class="list-group-item justify-content-between ">Lien CARMEN  :
					<a href="{{$znieff->lien_carmen2}}" target="_blank">
						<b>Cliquez ici<br></b>
					</a>
				</li>



			</ul>
			<br>
			@endforeach
		</div>
	</div>
</div>
@endif

@if(!empty($pnr)) 
<div class="col-md-9 offset-md-2">
	<div class="card" id="pnr">
		<div class="card-block">
			<h3 class="card-title">Parc naturels régionaux (PNR) </h3>
			<ul class="list-group">

				<li class="list-group-item justify-content-between "> 
					Nom :  
					<b>{{$pnr->nom_pnr}}<br></b>
				</li>

				<li class="list-group-item justify-content-between ">
					Surface en hectares : 
					<b> {{$pnr->surface}} <br></b> 
				</li>
				
			</ul>
			

		</div>
	</div>
</div>
 @endif

 @if (!empty($icpes->first()))
<div class="col-md-9 offset-md-2">
	<div class="card" id="icpe">
		<div class="card-block">
			<h3 class="card-title">Installations Classées pour la Protection de l'Environnement (ICPE) </h3>
			@foreach($icpes as $icpe)
			<ul class="list-group">

				<li class="list-group-item justify-content-between "> 
					Nom de l'entreprise propriétaire :  
					<b>{{$icpe->ents_proprietaire}}<br></b>
				</li>


				<li class="list-group-item justify-content-between ">
					Activité : 
					<b>{{$icpe->activite}}<br></b> 
				</li>

				<li class="list-group-item justify-content-between ">
					Classement :
					<b>{{$icpe->classement}}<br></b>

				</li>



			</ul>
			<br>
			@endforeach
		</div>
	</div>
</div>
@endif

<div class="col-md-9 offset-md-2">
			<div class="card" id="lien">
				<div class="card-block">
					<h3 class="card-title"><i class="glyphicon glyphicon-link"></i>Liens utiles</h3>
					<ul class="list-group">
						@foreach($lien_theme2s as $lien_theme2)
									<li class="list-group-item justify-content-between ">{{$lien_theme2->libelle}} :
										<a href="{{$lien_theme2->lien}}" target="_blank" style="max-width: 90%;" >
											<b>Cliquez ici <br></b>
										</a>
									</li>	
									@endforeach
						

					</ul>
				</div>
			</div>
		</div>
