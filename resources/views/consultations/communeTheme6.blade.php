@if (!empty($maets->first()))
<div class="col-md-10 offset-md-1">
	<div class="card" id="maet">
		<div class="card-block">
			<h3 class="card-title">Mesures agro-environnementales territorialisées(MAET) </h3>
			@foreach($maets as $maet)
			<ul class="list-group">

				<li class="list-group-item justify-content-between "> 
					Nom :  
					<b>{{$maet->nom_maet}}<br></b>
				</li>


				<li class="list-group-item justify-content-between ">
					Surface : 
					<b>{{$maet->surface}}<br></b> 
				</li>


			</ul>
			<br>
			@endforeach
		</div>
	</div>
</div>
@endif
<div class="col-md-10 offset-md-1  ">
	<div class="card" id="agricultures">
		<div class="card-block">
			<h3 class="card-title">Statistiques agricoles </h3>
			@foreach($agricultures as $agriculture)	
			<ul class="list-group">
				<li class="list-group-item justify-content-between "> 
					Année :  
					<b>
						{{$agriculture->annee}} 
					</b>
				</li>
				<li class="list-group-item justify-content-between "> 
					Nombre d'exploitations :  
					<b>
						{{$agriculture->exploit}} 
					</b>
				</li>

				<li class="list-group-item justify-content-between "> 
					Nombre d'unités de travail :  
					<b>
						{{$agriculture->unitravail}} 
					</b>
				</li>
				<li class="list-group-item justify-content-between "> 
					Surface Agricole Utile  
					<b>
						{{$agriculture->sau_ha}} 
					</b>
				</li>
				<li class="list-group-item justify-content-between "> 
					Cheptel :  
					<b>
						{{$agriculture->cheptel}} 
					</b>
				</li>
				<li class="list-group-item justify-content-between "> 
					Orientation technico-économique :  
					<b>
						{{$agriculture->orientecheco}} 
					</b>
				</li>

				<li class="list-group-item justify-content-between "> 
					Surfaces labourables en hectares :  
					<b>
						{{$agriculture->surflabour_ha}} 
					</b>
				</li>
				<li class="list-group-item justify-content-between "> 
					Surfaces de culture permanentes en hectares:  
					<b>
						{{$agriculture->surfcultperm_ha}} 
					</b>
				</li>
				<li class="list-group-item justify-content-between "> 
					Surfaces en herbes en hectares :  
					<b>
						{{$agriculture->surfherbe_ha}} 
					</b>
				</li>
			</ul>
			<br>
			@endforeach



		</div>
	</div>
</div>

<div class="col-md-10 offset-md-1 ">
	<div class="card">
		<div class="card-block">
			<h3 class="card-title"><i class="glyphicon glyphicon-link"></i>Liens utiles</h3>
			<ul class="list-group">

			@if(!(empty($comm->lien_enjeuxagri)))
				<li class="list-group-item justify-content-between ">
					Lien enjeux agricoles :  <b>{{$comm->lien_enjeuxagri}}</b>
				</li>
			@endif
				@foreach($lien_theme6s as $lien_theme6)
				<li class="list-group-item justify-content-between ">{{$lien_theme6->libelle}} :
					<a href="{{$lien_theme6->lien}}" target="_blank" style="max-width: 90%;" >
						<b>Cliquez ici <br></b>
					</a>
				</li>	
				@endforeach

			</ul>

		</div>
	</div>
</div>


