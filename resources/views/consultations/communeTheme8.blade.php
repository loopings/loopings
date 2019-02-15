<div class="col-md-12">
	<div class="card" id="lgmtcs">
		<div class="card-block">
			<h3 class="card-title">Logements commencés par types de construction</h3>
			<table class="table">
				<thead class="thead-default">
					<tr>

						<th>Année &nbsp; </th>
						<th>Nombre de logements individuels purs</th>
						<th>Nombre de logements individuels groupés</th>
						<th>Nombre de logements collectifs</th>
						<th>Nombre de logements en résidence</th>
					</tr>
				</thead>
				<tbody>

					@foreach($lgmtcs as $lgmtc)	
					<tr>

						<td> {{$lgmtc->annee}}   </td>
						<td> {{$lgmtc->nb_indiv_pur}}  </td>
						<td> {{$lgmtc->nb_indiv_gpes}}  </td>
						<td> {{$lgmtc->nb_collectifs}}  </td>
						<td> {{$lgmtc->nb_residence}}  </td>
					</tr>
					@endforeach
				</tbody>
			</table>	
			

		</div>
	</div>
</div>
<div class="col-md-12">
	<div class="card" >
		<div class="card-block">
			<h3 class="card-title">consommation du foncier</h3>
			<ul class="list-group">
				<li class="list-group-item justify-content-between"> 
					Vidéo
					<b>
						@if(!isset($comm->video_com_foncier))
						pas de vidéo	
						@else
						<a href="{{$comm->video_com_foncier}}" target="_blank">
							<b>Cliquez ici</b>
						</a>
						
						@endif

					</b>
					
				</li>
				<li class="list-group-item justify-content-between"> 
					Commune concernée par la consultation de la CDEPNAF lors de l'élaboration ou de la révision
					<b>
						@if(!isset($comm->cdepnaf))
						Pas d'information	
						@else
						{{$comm->cdepnaf}}
						@endif

					</b>
					
				</li>
			</ul>
			

		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="row">
		<div class="col-md-6 d-flex align-items-stretch">		
			<div class="card">
				<div class="card-block">
					<h3 class="card-title">EPF local ou d'Etat</h3>
					<ul class="list-group">
						<li class="list-group-item justify-content-between "> 
							Présence d'un établissement public foncier
							<b>
								@if(!isset($comm->epf))
								pas d'information	
								@else
								{{$comm->epf}}
								@endif

							</b>  
						</li>
					</ul>
					
				</div>
			</div>
		</div>


		<div class="col-md-6 d-flex align-items-stretch">
			<div class="card">
				<div class="card-block">
					<h3 class="card-title">Zones agricoles protégées</h3>
					<ul class="list-group">
						<li class="list-group-item justify-content-between "> 
							Présence d'une ZAP, démarche Etat
							<b>
								@if(!isset($comm->zap))
								pas d'information	
								@else
								{{$comm->zap}}
								@endif

							</b>  
						</li>
						<li class="list-group-item justify-content-between "> 
							Présence d'un PAEN, démarche CD38
							<b>
								@if(!isset($comm->paen))
								pas d'information	
								@else
								{{$comm->paen}}
								@endif

							</b>  
						</li>
						
					</ul>
					
				</div>
			</div>
		</div>
	</div>
</div>


<div class="col-md-12">
	<div class="card">
		<div class="card-block">
			<h3 class="card-title"><i class="glyphicon glyphicon-link"></i>Liens utiles</h3>
			<ul class="list-group">
				<li class="list-group-item justify-content-between "> 
					Lien OFPI
					<b>
						@if(!isset($epci->doc_ofpi))
						pas de vidéo	
						@else
						<a href="{{$epci->doc_ofpi}}" target="_blank">
							<b>Cliquez ici</b>
						</a>
						
						@endif

					</b>
				</li>
				@foreach($lien_theme8s as $lien_theme8)
				<li class="list-group-item justify-content-between ">{{$lien_theme8->libelle}} :
					<a href="{{$lien_theme8->lien}}" target="_blank" style="max-width: 90%;" >
						<b>Cliquez ici <br></b>
					</a>
				</li>	
				@endforeach

			</ul>

		</div>
	</div>
</div>

