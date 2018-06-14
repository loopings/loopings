<div class="col-md-12 ">
	<div class="card" id="agricultures">
		<div class="card-block">
			<h3 class="card-title">Statistiques agricoles </h3>

			<table class="table">
				<thead class="thead-default">
					<tr>

						<th style="vertical-align:text-top;">Année </th>
						<th style="vertical-align:text-top;"> Nombre d'exploitations  </th>
						<th style="vertical-align:text-top;">Nombre d'unités de travail</th>
						<th style="vertical-align:text-top;"> Surface Agricole Utile   </th>
						<th style="vertical-align:text-top;"> Cheptel    </th>
						<th style="vertical-align:text-top;"> Orientation technico-économique </th>
						<th style="vertical-align:text-top;">   Surfaces labourables en hectares  </th>
						<th style="vertical-align:text-top;">    Surfaces de culture permanentes en hectares </th>
						<th style="vertical-align:text-top;">  Surfaces en herbes en hectares   </th>
						
					</tr>
				</thead>
				<tbody>

					@foreach($agricultures as $agriculture)	
					<tr>

						<td> {{$agriculture->annee}}  </td>
						<td> {{$agriculture->exploit}}   </td>
						<td> {{$agriculture->unitravail}}  </td>
						<td> {{$agriculture->sau_ha}}  </td>
						<td> {{$agriculture->cheptel}}  </td>
						<td> {{$agriculture->orientecheco}}  </td>
						<td> {{$agriculture->surflabour_ha}}  </td>						
						<td> {{$agriculture->surfcultperm_ha}}  </td>
						<td> {{$agriculture->surfherbe_ha}}   </td>
					</tr>
					@endforeach
				</tbody>
			</table>						

		</div>
	</div>
</div>


<div class="col-md-12">
	<div class="card" id="maet">
		<div class="card-block">
			<h3 class="card-title">Mesures agro-environnementales territorialisées(MAET) </h3>
			
			<ul class="list-group">
				@if (!empty($maets->first()))
				@foreach($maets as $maet)
				<li class="list-group-item justify-content-between "> 
					Nom :  
					<b>{{$maet->nom_maet}}<br></b>
				</li>
				@endforeach
				@else
				<li class="list-group-item justify-content-between "> 
					<b>Pas de MAET<br></b>
				</li>
				@endif
				<li class="list-group-item justify-content-between "> 
					Carte des MAET 
					<b>
						@foreach($lienGs as $lienG)
						@if($lienG->nom=="carte_maet")
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
</div>


<div class="col-md-12">
	<div class="card" id="aocaop">
		<div class="card-block">
			<h3 class="card-title">Production sous signes de qualité </h3>
			
			
			<ul class="list-group">
				
				<li class="list-group-item justify-content-between "> 
					Liste des AOC/AOP, pour connaitre les iGP voir site INAO
					@if (!empty($aocaops->first()))
					<ul>
					@foreach($aocaops as $aocaop)
					<li>
					<b>
						{{$aocaop->nom_aoc_aop}} {{$aocaop->annee_maj}}
					</b>
					</li>
					@endforeach
					</ul>
					@else
				 
					<b>Pas de AOC AOP<br></b>
					@endif
				</li>				

			</ul>
			</div>
		</div>
	</div>


	<div class="col-md-12 ">
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


