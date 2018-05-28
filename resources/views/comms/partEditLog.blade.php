  <div>


    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Infos logements
        </div>
        <div class="panel-body">
          <div class="form-group col-md-4">
            {{Form::label('objectif_log_cons', 'Objectif construction de logements : ')}}
            {{Form::text('objectif_log_cons',$comm->objectif_log_cons, ['class' => 'form-control'])}}
          </div>
          <div class="form-group col-md-4">
            {{Form::label('scot_dec_objectif', 'Scot decision objectif (entier): ')}}
            {{Form::text('scot_dec_objectif',$comm->scot_dec_objectif, ['class' => 'form-control'])}}
          </div>

          <div class="form-group col-md-4">
            {{Form::label('type_polarite', 'Type polarité : ')}}
            {{Form::text('type_polarite',$comm->type_polarite, ['class' => 'form-control'])}}
          </div>

          <div class="form-group col-md-4">
            {{Form::label('nb_ppi', 'Nombre de PPI (entier)  : ')}}
            {{Form::text('nb_ppi',$comm->nb_ppi, ['class' => 'form-control'])}}
          </div>









          <div class="form-group col-md-4">
            <b>Loi Solidarité et Renouvellement Urbain (SRU) : </b>
            <br><br>
            

            <input name='loi_sru' type="checkbox" data-switch-always  data-off-label="Non" data-on-label="Oui" @if($comm->loi_sru)checked @endif>

          </div>


          <div class="form-group col-md-4">
            {{Form::label('anne_maj_sru', 'Date de mise à jour de la donnée loi SRU (année) : ')}}
            {{Form::text('anne_maj_sru',$comm->anne_maj_sru, ['class' => 'form-control'])}}
          </div>


        </div>


      </div>
    </div>

    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Foncier
        </div>
        <div class="panel-body">
          <div class="form-group col-md-12">
            {{Form::label('video_com_foncier', 'Vidéo foncier : ')}}
            {{Form::text('video_com_foncier',$comm->video_com_foncier, ['class' => 'form-control'])}}
          </div>
        </div>
      </div>
    </div>
  </div>



