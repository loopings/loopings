  <div>


    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Infos logements
        </div>
        <div class="panel-body">
          <div class="form-group col-md-4">
            {{Form::label('objectif_log_cons', 'Objectif construction de logements : ')}}
            {{Form::text('objectif_log_cons', '', ['class' => 'form-control'])}}
          </div>
          <div class="form-group col-md-4">
            {{Form::label('scot_dec_objectif', 'Scot decision objectif (entier): ')}}
            {{Form::text('scot_dec_objectif', '', ['class' => 'form-control'])}}
          </div>

          <div class="form-group col-md-4">
            {{Form::label('type_polarite', 'Type polarité : ')}}
            {{Form::text('type_polarite', '', ['class' => 'form-control'])}}
          </div>
          <div class="form-group col-md-4">
            {{Form::label('nb_lits_touristiques', 'Nombre de lits touristiques (entier)  : ')}}
            {{Form::text('nb_lits_touristiques', '', ['class' => 'form-control'])}}
          </div>

          <div class="form-group col-md-4">
            {{Form::label('nb_ppi', 'Nombre de PPI (entier)  : ')}}
            {{Form::text('nb_ppi', '', ['class' => 'form-control'])}}
          </div>









          <div class="form-group col-md-4">
            <b>Loi Solidarité et Renouvellement Urbain (SRU) : </b>
            <br><br>
            

            <input name='loi_sru' type="checkbox" data-switch-always  data-off-label="Non" data-on-label="Oui">




          </div>






          <div class="form-group col-md-8">
            {{Form::label('id_cucs', 'Contrats Urbains de Cohésion Sociale (CUCS) : ')}}
            {{Form::select('id_cucs', $cucss ,null, ['placeholder' => 'Sélectionner un contrat ', 'class' => 'form-control'])}}

          </div>


        </div>


      </div>
    </div>
  </div>



