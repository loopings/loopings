<div>


  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        Fusion de communes
      </div>
      <div class="panel-body">
        <div class="form-group col-md-6">
          {{Form::label('commune_etat', 'Commune actuelle ou fusionnée ? : ')}}
          {{Form::select('commune_etat', ['actuelle'=>'actuelle','fusionnée'=>'fusionnée'] ,null, ['placeholder' => 'Sélectionner  ', 'class' => 'form-control'])}}
        </div>

        <div class="form-group col-md-6">
          {{Form::label('resultat_fusion', 'Commune résultante si fusion: ')}}
          {{Form::select('resultat_fusion', $comm->orderBy('nom_comm')->pluck('nom_comm','id'),null, ['placeholder' => 'Sélectionner une commune ', 'class' => 'form-control'])}}

        </div>

      </div>
    </div>
  </div>
</div>