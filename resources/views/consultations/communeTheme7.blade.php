<div style="position:fixed;">
	<ul class="nav nav-pills flex-column" >

		@if (!empty($troncons->first()))
		<li class="nav-item" >
			<a class="nav-link " href="#troncon"  style="width: 140px;background-color:#f0f5ff;"><br>Tronçons</a>
		</li>
		@endif

		
		<li class="nav-item">
			<a class="nav-link" href="#lien7" style="width: 140px;margin-top: 20px;background-color:#f0f5ff;"><br>Liens utiles </a>
		</li>
	


	</ul> 
</div>


@if (!empty($troncons->first()))

<div class="col-md-9 offset-md-2">
	<div class="card" id="troncon">
		<div class="card-block">
			<h3 class="card-title">Tronçons et routes</h3>
			<table class="table">
				<thead class="thead-default">
					<tr>

						<th>Route ou tronçon</th>
						<th>Type</th>
						<th>Catégorie de nuisance sonore</th>
						<th>Longueur (en mètres)</th>
					</tr>
				</thead>
				<tbody>

					@foreach($troncons as $troncon)
					<tr>

						<td>{{$troncon->numero_route_ou_troncon}}</td>
						<td>{{$troncon->type}}</td>
						<td>{{$troncon->categorie_nuisonore}}</td>
						<td>{{(int)$troncon->longueur_m}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>	
			
		</div>
	</div>
</div>

@endif

<div class="col-md-9 offset-md-2">
	<div class="card" id="lien7">
		<div class="card-block">
			<h3 class="card-title"><i class="glyphicon glyphicon-link"></i>Liens utiles</h3>
			<ul class="list-group">
				@foreach($lien_theme7s as $lien_theme7)
									<li class="list-group-item justify-content-between ">{{$lien_theme7->libelle}} :
										<a href="{{$lien_theme7->lien}}" target="_blank" style="max-width: 90%;" >
											<b>Cliquez ici <br></b>
										</a>
									</li>	
									@endforeach

			</ul>

		</div>
	</div>
</div>




