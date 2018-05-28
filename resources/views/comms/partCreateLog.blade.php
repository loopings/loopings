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
            {{Form::label('nb_ppi', 'Nombre de PPI (entier)  : ')}}
            {{Form::text('nb_ppi', '', ['class' => 'form-control'])}}
          </div>



        </div>


      </div>
    </div>


    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Loi Solidarité et Renouvellement Urbain (SRU) :
        </div>
        <div class="panel-body">
         <div class="form-group col-md-6">
          <b>Loi Solidarité et Renouvellement Urbain (SRU) : </b>
          <br><br>
          <input name='loi_sru' type="checkbox" data-switch-always  data-off-label="Non" data-on-label="Oui">
        </div>

        <div class="form-group col-md-6">
          {{Form::label('anne_maj_sru', 'Année de la donnée : ')}}
          {{Form::text('anne_maj_sru', '', ['class' => 'form-control'])}}
        </div>


      </div>
    </div>
  </div>

  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        Logement et politique de la ville :
      </div>
      <div class="panel-body">

        <div class="form-group col-md-4">
          <b>Commune carencée : </b>
          <br><br>
          <input name='comm_carrencee' type="checkbox" data-switch-always  data-off-label="Non" data-on-label="Oui">
        </div>

        <div class="form-group col-md-4">
          <b>Commune exonérée : </b>
          <br><br>
          <input name='comm_exoneree' type="checkbox" data-switch-always  data-off-label="Non" data-on-label="Oui">
        </div>

        <div class="form-group col-md-12">
          {{Form::label('lien_politique_ville', 'Lien olitique de la ville: ')}}
          {{Form::text('lien_politique_ville', '', ['class' => 'form-control'])}}
        </div>


      </div>
    </div>
  </div>

<div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        Transition énergétique et déplacements :
      </div>
      <div class="panel-body">


        <div class="form-group col-md-4">
          {{Form::label('territoire_pdu', 'Territoire concerné par un PDU : ')}}
          {{Form::text('territoire_pdu', '', ['class' => 'form-control'])}}
        </div>

        <div class="form-group col-md-4">
          {{Form::label('territoire_ppa', 'Territoire concerné par un PPA : ')}}
          {{Form::text('territoire_ppa', '', ['class' => 'form-control'])}}
        </div>

        <div class="form-group col-md-4">
          {{Form::label('territoire_peb', 'Territoire concerné par un PEB : ')}}
          {{Form::text('territoire_peb', '', ['class' => 'form-control'])}}
        </div>


      </div>
    </div>
  </div>


  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        Foncier :
      </div>
      <div class="panel-body">
         <div class="form-group col-md-12">
          {{Form::label('video_com_foncier', 'Vidéo foncier : ')}}
          {{Form::text('video_com_foncier', '', ['class' => 'form-control'])}}
        </div>

        <div class="form-group col-md-4">
          {{Form::label('zap', 'ZAP : ')}}
          {{Form::text('zap', '', ['class' => 'form-control'])}}
        </div>
        <div class="form-group col-md-4">
          {{Form::label('paen', 'PAEN : ')}}
          {{Form::text('paen', '', ['class' => 'form-control'])}}
        </div>
        <div class="form-group col-md-4">
          {{Form::label('cdepnaf', 'CDEPNAF : ')}}
          {{Form::text('cdepnaf', '', ['class' => 'form-control'])}}
        </div>
        <div class="form-group col-md-4">
          {{Form::label('epf', 'EPF : ')}}
          {{Form::text('epf', '', ['class' => 'form-control'])}}
        </div>
       

        <div class="form-group col-md-4">
          {{Form::label('libelle_plh', 'Libellé PLH : ')}}
          {{Form::text('libelle_plh', '', ['class' => 'form-control'])}}
        </div>

        <div class="form-group col-md-4">
          {{Form::label('etat_avancement_plh', 'Etat d\'avancement PLH  : ')}}
          {{Form::text('etat_avancement_plh', '', ['class' => 'form-control'])}}
        </div>

        <div class="form-group col-md-4">
          {{Form::label('date_validation_plh', 'Date validation PLH  : ')}}
          {{Form::text('date_validation_plh', '', ['class' => 'form-control'])}}
        </div>

        <div class="form-group col-md-4">
          {{Form::label('lien_doc_plh', 'lien doc PLH  : ')}}
          {{Form::text('lien_doc_plh', '', ['class' => 'form-control'])}}
        </div>


      </div>
    </div>
  </div>
</div>



