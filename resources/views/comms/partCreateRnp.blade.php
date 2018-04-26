  <div>


  <div class="col-md-6">
    <div class="panel panel-default" bgcolor="#00C499">
      <div class="panel-heading" >
        Ressources naturelles et paysagères
      </div>
      <div class="panel-body">
        <div class="form-group col-md-6">
          {{Form::label('id_pnr', 'PNR: ')}}
          {{Form::select('id_pnr', $pnrs ,null, ['placeholder' => 'Sélectionner un parc', 'class' => 'form-control'])}}
        </div>

        </div>
      </div>
    </div>

    
  </div>
  
