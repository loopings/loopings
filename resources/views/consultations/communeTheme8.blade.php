<div class="col-md-10 offset-md-1  ">
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



<div class="col-md-10 offset-md-1">
	<div class="card">
		<div class="card-block">
			<h3 class="card-title"><i class="glyphicon glyphicon-link"></i>Liens utiles</h3>
			<ul class="list-group">
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

