  <div>


   <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        Supervision DDT38
      </div>
      <div class="panel-body">
        <div class="form-group col-md-6">
          {{Form::label('id_agent_car', 'Responsable de la cellule affichage des risques : ')}}
          {{Form::select('id_agent_car', $agent_cars ,null, ['placeholder' => 'Sélectionner un agent', 'class' => 'form-control'])}}
        </div>
        <div class="form-group col-md-6">
          {{Form::label('id_agent_car2', 'Second responsable de la cellule affichage des risques (laissez vide si inexistant) : ')}}
          {{Form::select('id_agent_car2', $agent_cars ,null, ['placeholder' => 'Sélectionner un agent', 'class' => 'form-control'])}}
        </div>
        <div class="form-group col-md-6">
          {{Form::label('id_cham', 'Chargé de planification à la DDT : ')}}
          {{Form::select('id_cham', $chams,null, ['placeholder' => 'Sélectionner un agent', 'class' => 'form-control'])}}
        </div>
        <div class="form-group col-md-6">
          {{Form::label('id_cham2', 'Second chargé de planification à la DDT (laissez vide si inexistant) : ')}}
          {{Form::select('id_cham2', $chams,null, ['placeholder' => 'Sélectionner un agent', 'class' => 'form-control'])}}
        </div>
      </div>

    </div>
  </div>


  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        Déplacements domicile-travail et actifs restants/sortants
      </div>
      <div class="panel-body">
        <div class="form-group col-md-4">
          {{Form::label('nb_actifs', 'Nombre d\'actifs au total')}}
          {{Form::text('nb_actifs', '', ['class' => 'form-control'])}}
        </div>
        <div class="form-group col-md-4">
          {{Form::label('nb_actifs_restants', 'Nombre d\'actifs restants')}}
          {{Form::text('nb_actifs_restants', '', ['class' => 'form-control'])}}
        </div>
        <div class="form-group col-md-4">
          {{Form::label('nb_actifs_sortants', 'Nombre d\'actifs sortants')}}
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
      
      <div class="form-group col-md-4">
        {{Form::label('evolution_5', 'Evolution sur les 5 dernières années : ')}}
        {{Form::text('evolution_5', '', ['class' => 'form-control'])}}
      </div>

      <div class="form-group col-md-4">
        {{Form::label('nb_voit_men', 'Nombre de voiture par ménage : ')}}
        {{Form::text('nb_voit_men','', ['class' => 'form-control'])}}
      </div>

      <div class="form-group col-md-4">
        {{Form::label('annee_maj_motor', 'Année de la donnée : ')}}
        {{Form::text('annee_maj_motor', '', ['class' => 'form-control'])}}
      </div>
    </div>
  </div>
</div>


<div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      Documents employés pour la réglementation de 
      l’urbanisme
    </div>
    <div class="panel-body">
      <div class="form-group col-md-6">
        {{Form::label('docurba', 'Type de document réglementaire appliqué et 
        procédure en cours : ')}}
        {{Form::text('docurba', '', ['class' => 'form-control'])}}
      </div>
      <div class="form-group col-md-6">
        {{Form::label('annee_maj_docurba', 'Année de la donnée : ')}}
        {{Form::text('annee_maj_docurba', '', ['class' => 'form-control'])}}
      </div>


    </div>
  </div>
</div>

<div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      Numérisation des documents réglementaires 
      d’urbanisme
    </div>
    <div class="panel-body">
      <div class="form-group col-md-6">
        <b>Etat de la numérisation des documents 
        réglementaires d’urbanisme: </b>
        <br><br>
        <input name='numer_docurba' type="checkbox" data-switch-always  data-off-label="Non" data-on-label="Oui">

      </div>
      <div class="form-group col-md-6">
        {{Form::label('annee_maj_num_docurba', 'Année de la donnée : ')}}
        {{Form::text('annee_maj_num_docurba', '', ['class' => 'form-control'])}}
      </div>
    </div>
  </div>
</div>

<div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      Documents opposables
    </div>
    <div class="panel-body">
     <div class="form-group col-md-6">
      <b>disposition opposable : </b>
      <br><br>
      <input name='disposition_opposable' type="checkbox" data-switch-always  data-off-label="Non" data-on-label="Oui">

    </div>
    <div class="form-group col-md-6">
      {{Form::label('doc_urba_opposable', 'Document urbanisme opposable : ')}}
      {{Form::text('doc_urba_opposable', '', ['class' => 'form-control'])}}
    </div>

    <div class="form-group col-md-6">
      {{Form::label('dern_doc_oppo_num', 'Dernier document opposable numérisé : ')}}
      {{Form::text('dern_doc_oppo_num', '', ['class' => 'form-control'])}}
    </div>
    <div class="form-group col-md-6">
      {{Form::label('date_dern_doc_opposable', 'Date du dernier document opposable numérisé : ')}}
      {{Form::text('date_dern_doc_opposable','', ['class' => 'form-control'])}}
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





<div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      Zones dites « loi Montagne »
    </div>


    <div class="panel-body">


      <div class="form-group col-md-4">
        <b>Etat sur le classement ou non en zone « loi 
        Montagne » :</b>
        <br><br>
        <input name='class_zonemontagne' type="checkbox" data-switch-always  data-off-label="Non" data-on-label="Oui">

      </div>

      <div class="form-group col-md-8">
        {{Form::label('liste_hameaux', 'Liste des hameaux : ')}}
        {{Form::text('liste_hameaux', '', ['class' => 'form-control'])}}
      </div>

      <div class="form-group col-md-6">
        {{Form::label('annee_maj_zm', 'Année de la donnée : ')}}
        {{Form::text('annee_maj_zm', '', ['class' => 'form-control'])}}
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


<div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      Autres
    </div>
    <div class="panel-body">
      <div class="form-group col-md-6">
        {{Form::label('tx_amenagement', 'Taxe d\'aménagement : ')}}
        {{Form::text('tx_amenagement', '', ['class' => 'form-control'])}}
      </div>

      <div class="form-group col-md-6">
        {{Form::label('competence_urba', 'Compétence urbanisme : ')}}
        {{Form::text('competence_urba', '', ['class' => 'form-control'])}}
      </div>
      <div class="form-group col-md-6">
        {{Form::label('tri', 'TRI : ')}}
        {{Form::text('tri', '', ['class' => 'form-control'])}}
      </div>
      <div class="form-group col-md-6">
        {{Form::label('slgri', 'SLGRI : ')}}
        {{Form::text('slgri', '', ['class' => 'form-control'])}}
      </div>
      <div class="form-group col-md-12">
        {{Form::label('regl_boisement', 'Commune concernée par une réglementation de boisement : ')}}
        {{Form::text('regl_boisement', '', ['class' => 'form-control'])}}
      </div>

      
    </div>
  </div>
</div>