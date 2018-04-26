
<div class="col-md-10 offset-md-1">
	<div class="card" >
		<div class="card-block">
			<h3 class="card-title">Informations </h3>
			<ul class="list-group">

				<li class="list-group-item justify-content-between "> 
					Loi Solidarité et Renouvellement Urbain SRU :  
					<b>@if($comm->loi_sru)Oui @else Non @endif</b>
				</li>

				<li class="list-group-item justify-content-between ">
					Objectif SCOT) : 
					<b> {{$comm->dec_objectif}} logements par an et pour 1000 habitants</b> 
				</li>

				<li class="list-group-item justify-content-between ">
					Objectif SCOT appliqué à la commune : 
					<b> {{$comm->objectif_log_cons}} logements</b> 
				</li>

				<li class="list-group-item justify-content-between ">
					Type de polarité  : 
					<b> {{$comm->type_polarite}} </b> 
				</li>
				<li class="list-group-item justify-content-between ">
					nombre de lits touristiques : 
					<b> {{$comm->nb_lits_touristiques}} </b> 
				</li>
				<li class="list-group-item justify-content-between ">
					nombre de PPI : 
					<b> {{$comm->nb_ppi}} </b> 
				</li>
				
			</ul>


		</div>
	</div>
</div>

<div class="col-md-10 offset-md-1  ">
	<div class="card" id="lgmts">
		<div class="card-block">
			<h3 class="card-title">Logements </h3>
			
			<table class="table">
				<thead class="thead-default">
					<tr>

						<th>Année &nbsp; </th>
						<th> Total &nbsp; </th>
						<th>  Résidences principales   </th>
						<th>  Résidences secondaires   </th>
						<th> Logements vacants    </th>
						<th>   Maisons &nbsp; </th>
						<th>   Appartements &nbsp; </th>
						<th>    Logements sociaux </th>
						<th>     </th>
					</tr>
				</thead>
				<tbody>

					@foreach($lgmts as $lgmt)	
					<tr>

						<td> {{$lgmt->annee}}   </td>
						<td> {{$lgmt->total_lgmts}}  </td>
						<td> {{$lgmt->resid_princ}}  </td>
						<td> {{$lgmt->resid_second}}  </td>
						<td> {{$lgmt->lgmts_vacants}}  </td>
						<td> {{$lgmt->maisons}}  </td>
						<td> {{$lgmt->appartements}}  </td>
						<td> {{$lgmt->lgmts_sociaux}}  </td>
					</tr>
					@endforeach
				</tbody>
			</table>	


		</div>
	</div>
</div>

@if(!empty($cucs)) 
<div class="col-md-10 offset-md-1 ">
	<div class="card" id="cucs">
		<div class="card-block">
			<h3 class="card-title">Contrats Urbains de Cohésion Sociale CUCS </h3>
			<ul class="list-group">

				<li class="list-group-item justify-content-between "> 
					Nom :  
					<b>{{$cucs->nom_cucs}}<br></b>
				</li>
				<li class="list-group-item justify-content-between "> 
					Lien SIG politique de la ville :  
					<a href="{{$cucs->lien_sigvillegouv}}" target="_blank" style="max-width: 90%;" >
						<b>Cliquez ici <br></b>
					</a>
				</li>



			</ul>


		</div>
	</div>
</div>

@endif

@if (!empty($zus->first()))

<div class="col-md-10 offset-md-1  ">
	<div class="card" id="lgmts">
		<div class="card-block">
			<h3 class="card-title">Zones urbaines sensibles ZUS </h3>
			@foreach($zus as $zu)	
			<ul class="list-group">
				<li class="list-group-item justify-content-between "> 
					Nom :  
					<b>
						{{$zu->nom_zus}} 
					</b>
				</li>

			</ul>
			<br>
			@endforeach

		</div>
	</div>
</div>
@endif


@if (!empty($quartiers->first()))
<div class="col-md-10 offset-md-1  ">



	<div class="card" id="lgmts">
		<div class="card-block">
			<h3 class="card-title">Quartiers non situés en Zones urbaines mais couverts par des Contrats Urbains de Cohésion Sociale </h3>
			@foreach($quartiers as $quartier)	
			<ul class="list-group">
				<li class="list-group-item justify-content-between "> 
					Nom :  
					<b>
						{{$quartier->nom_quartier}} 
					</b>
				</li>

			</ul>
			<br>
			@endforeach

		</div>
	</div>
</div>
@endif


<div class="col-md-10 offset-md-1 ">
	<div class="card" id="lien5">
		<div class="card-block">
			<h3 class="card-title"><i class="glyphicon glyphicon-link"></i>Liens utiles</h3>
			<ul class="list-group">
				@foreach($lien_theme5s as $lien_theme5)
									<li class="list-group-item justify-content-between ">{{$lien_theme5->libelle}} :
										<a href="{{$lien_theme5->lien}}" target="_blank" style="max-width: 90%;" >
											<b>Cliquez ici <br></b>
										</a>
									</li>	
									@endforeach



				</ul>
			</div>
		</div>
	</div>