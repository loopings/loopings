  <div>

    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          Déplacements domicile-travail et actifs restants/sortants
        </div>
        <div class="panel-body">
          <div class="form-group col-md-4">
            {{Form::label('nb_actifs', 'Nombre d\'actifs au total : ')}}
            {{Form::text('nb_actifs', '', ['class' => 'form-control'])}}
          </div>
          <div class="form-group col-md-4">
            {{Form::label('nb_actifs_restants', 'Nombre d\'actifs restants : ')}}
            {{Form::text('nb_actifs_restants', '', ['class' => 'form-control'])}}
          </div>
          <div class="form-group col-md-4">
            {{Form::label('nb_actifs_sortants', 'Nombre d\'actifs sortants : ')}}
            {{Form::text('nb_actifs_sortants', '', ['class' => 'form-control'])}}
          </div>

        </div>
      </div>
    </div>


    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
         Zones d'emplois
       </div>
       <div class="panel-body">
        <div class="form-group col-md-6">
          {{Form::label('id_ze', 'Zone d\'emploi: ')}}
          {{Form::select('id_ze', $zes ,null, ['placeholder' => 'Sélectionner une zone', 'class' => 'form-control'])}}
        </div>

      </div>
    </div>
  </div>
</div>




<div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      Motorisation des ménages
    </div>
    <div class="panel-body">
      <div class="form-group col-md-4">
        {{Form::label('nb_men_tot', 'Nombre de ménages total : ')}}
        {{Form::text('nb_men_tot', '', ['class' => 'form-control'])}}
      </div>

      <div class="form-group col-md-4">
        {{Form::label('nb_men_1veh', 'Nombre de ménages possédant au moins un 
        véhicule : ')}}
        {{Form::text('nb_men_1veh', '', ['class' => 'form-control'])}}
      </div>
      <div class="form-group col-md-4">
        {{Form::label('nb_men_2veh', 'Nombre de ménages possédant deux véhicules et 
        plus : ')}}
        {{Form::text('nb_men_2veh', '', ['class' => 'form-control'])}}
      </div>

    </div>
  </div>
</div>


<div class="col-md-6">
  <div class="panel panel-default">
    <div class="panel-heading">
      Documents employés pour la réglementation de 
      l’urbanisme
    </div>
    <div class="panel-body">
      <div class="form-group col-md-12">
        {{Form::label('docurba', 'Type de document réglementaire appliqué et 
        procédure en cours : ')}}
        {{Form::text('docurba', '', ['class' => 'form-control'])}}
      </div>


    </div>
  </div>
</div>

<div class="col-md-6">
  <div class="panel panel-default">
    <div class="panel-heading">
      Enjeux agricoles
    </div>
    <div class="panel-body">
      <div class="form-group col-md-12">
        {{Form::label('lien_enjeuxagri', 'Adresse du dossier sur le serveur de la DDT : ')}}
        {{Form::text('lien_enjeuxagri', '', ['class' => 'form-control'])}}
      </div>


    </div>
  </div>
</div>


<div class="col-md-6">
  <div class="panel panel-default">
    <div class="panel-heading">
      Numérisation des documents réglementaires 
      d’urbanisme
    </div>
    <div class="panel-body">
      <div class="form-group col-md-12">
        <b>Etat de la numérisation des documents 
          réglementaires d’urbanisme: </b>
          <br><br>
          <input name='numer_docurba' type="checkbox" data-switch-always  data-off-label="Non" data-on-label="Oui">

        </div>
      </div>
    </div>
  </div>


  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
       Plans de Prévention des Risques (PPR)
     </div>
     <div class="panel-body">

       <div class="form-group col-md-4">
        <b>Etat sur la mise en place ou non d’un document de 
          type PPR: </b>
          <br><br>
          <input name='mise_en_place_ppr' type="checkbox" data-switch-always  data-off-label="Non" data-on-label="Oui">

        </div>






        <div class="form-group col-md-4">
          <b>Etat sur la prescription ou non d’un PPRM : </b>
          <br><br>
          <input name='prescri_pprm' type="checkbox" data-switch-always  data-off-label="Non" data-on-label="Oui">

        </div>

        <div class="form-group col-md-4">
          <b>Etat sur la prescription ou non d’un PPRT :  </b>
          <br><br>
          <input name='prescri_pprt' type="checkbox" data-switch-always  data-off-label="Non" data-on-label="Oui">

        </div>

        <div class="form-group col-md-4">
          <b>Etat sur la prescription ou non d’un PPRI :</b>
          <br><br>
          <input name='prescri_ppri' type="checkbox" data-switch-always  data-off-label="Non" data-on-label="Oui">

        </div>

        <div class="form-group col-md-4">
          <b>Etat sur la prescription ou non d’un PPRMIN :</b>
          <br><br>
          <input name='prescri_pprmin' type="checkbox" data-switch-always  data-off-label="Non" data-on-label="Oui">
        </div>





        <div class="form-group col-md-4">
          <b>Etat sur la prescription ou non d’un document de 
            type PPR :</b>
            <br><br>
            <input name='prescription' type="checkbox" data-switch-always  data-off-label="Non" data-on-label="Oui">


          </div>

          <div class="form-group col-md-4">
            <b>Etat sur la mise en place ou non d’un document ne 
              valant pas PPR :</b>
              <br><br>
              <input name='valant_pas_ppr' type="checkbox" data-switch-always  data-off-label="Non" data-on-label="Oui">


            </div>

            




            <div class="form-group col-md-4">
              <b>Etat sur l’existence ou non d’un porté à 
                connaissance pour un PPRN:</b>
                <br><br>
                <input name='pac_pprn' type="checkbox" data-switch-always  data-off-label="Non" data-on-label="Oui">

              </div>


              <div class="form-group col-md-4">
                <b>Etat sur l’existence ou non d’un porté à 
                  connaissance pour un PPRT:</b>
                  <br><br>
                  <input name='pac_pprt' type="checkbox" data-switch-always  data-off-label="Non" data-on-label="Oui">

                </div>





                <div class="form-group col-md-4">
                  <b>Etat sur la mise en place ou non d’un document 
                    valant PPR:</b>
                    <br><br>
                    <input name='valant_ppr' type="checkbox" data-switch-always  data-off-label="Non" data-on-label="Oui">


                  </div>



                  <div class="form-group col-md-12">

                    <div class="form-group col-md-4">
                      {{Form::label('type_ppr', 'Type de PPR : ')}}
                      {{Form::text('type_ppr', '', ['class' => 'form-control'])}}
                    </div>


                    <div class="form-group col-md-4">
                      {{Form::label('type_pas_ppr', 'Type de document valant pas PPR : ')}}
                      {{Form::text('type_pas_ppr', '', ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group col-md-4">
                      {{Form::label('type_valant_ppr', 'Type de document valant PPR : ')}}
                      {{Form::text('type_valant_ppr', '', ['class' => 'form-control'])}}
                    </div>
                  </div>

                </div>
              </div>
            </div>




            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  Zones dites « loi Montagne »
                </div>


                <div class="panel-body">


                  <div class="form-group col-md-9">
                    <b>Etat sur le classement ou non en zone « loi 
                      Montagne » :</b>
                      <br><br>
                      <input name='class_zonemontagne' type="checkbox" data-switch-always  data-off-label="Non" data-on-label="Oui">


                    </div>

                    <div class="form-group col-md-4">
                      {{Form::label('arrete_20fev1974', 'Parties du territoire communal classées en zone « loi Montagne » par l’arrêté du 20 février 1974 : ')}}
                      {{Form::text('arrete_20fev1974', '', ['class' => 'form-control'])}}
                    </div>

                    <div class="form-group col-md-4">
                      {{Form::label('arrete_28avr1976', 'Parties du territoire communal classées en zone « loi Montagne » par l’arrêté du 28 avril 1976 : ')}}
                      {{Form::text('arrete_28avr1976', '', ['class' => 'form-control'])}}
                    </div>                      

                    <div class="form-group col-md-4">
                      {{Form::label('arrete_29janv1982', 'Parties du territoire communal classées en zone « loi Montagne » par l’arrêté du 29 janvier 1982 : ')}}
                      {{Form::text('arrete_29janv1982', '', ['class' => 'form-control'])}}
                    </div>

                  </div>
                </div>
              </div>




              <div class="col-md-12">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    Aménagement
                  </div>
                  <div class="panel-body">
                    <div class="form-group col-md-4">
                      {{Form::label('id_dta', 'Directives Territoriales d’Aménagement : ')}}
                      {{Form::select('id_dta', $dtas ,null, ['placeholder' => 'Sélectionner une directive', 'class' => 'form-control'])}}
                    </div>
                    <div class="form-group col-md-4">
                      {{Form::label('id_au', 'Typologie aires urbaines : ')}}
                      {{Form::select('id_au', $aus,null, ['placeholder' => 'Sélectionner une typologie', 'class' => 'form-control'])}}
                    </div>
                    <div class="form-group col-md-4">
                      {{Form::label('id_uu', 'Unités urbaines : ')}}
                      {{Form::select('id_uu', $uus ,null, ['placeholder' => 'Sélectionner une unité', 'class' => 'form-control'])}}
                    </div>


                  </div>
                </div>
              </div>
