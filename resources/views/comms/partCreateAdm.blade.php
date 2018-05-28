  <div>
    

    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Généralité
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="form-group col-md-4">
              {{Form::label('nom_comm', 'Nom de la commune')}}
              {{Form::text('nom_comm', '', ['class' => 'form-control'])}}
            </div>
            <div class="form-group col-md-4">
              {{Form::label('code_insee', 'Code INSEE de la commune')}}
              {{Form::text('code_insee', '', ['class' => 'form-control'])}}
            </div>
            <div class="form-group col-md-4">
              {{Form::label('surface_hectares', 'Surface en hectares')}}
              {{Form::text('surface_hectares', '', ['class' => 'form-control'])}}
            </div>

          </div>
        </div>
      </div>
    </div>


    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Liens utiles
        </div>
        <div class="panel-body">
          <div class="form-group col-md-6">
            {{Form::label('lien_synthavis', 'Synthèse des avis DDT')}}
            {{Form::text('lien_synthavis', '', ['class' => 'form-control'])}}
          </div>

          <div class="form-group col-md-6">
            {{Form::label('lien_bddreal', 'Lien BD Dreal : ')}}
            {{Form::text('lien_bddreal','', ['class' => 'form-control'])}}
          </div>

          <div class="form-group col-md-6">
            {{Form::label('lien_gmaps', 'Lien google maps :')}}
            {{Form::text('lien_gmaps','', ['class' => 'form-control'])}}
          </div>

          <div class="form-group col-md-6">
            {{Form::label('lien_insee_chiffres', 'Chiffres clé INSEE :')}}
            {{Form::text('lien_insee_chiffres','', ['class' => 'form-control'])}}
          </div>

          <div class="form-group col-md-6">
            {{Form::label('lien_agriterri38', 'Lien agriterri38 :')}}
            {{Form::text('lien_agriterri38','', ['class' => 'form-control'])}}
          </div>

          <div class="form-group col-md-6">
            {{Form::label('lien_geoidecarto', 'Lien geoidecarto :')}}
            {{Form::text('lien_geoidecarto','', ['class' => 'form-control'])}}
          </div>


          <div class="form-group col-md-6">
            {{Form::label('lien_dossier_complet_insee', 'Dossier complet INSEE :')}}
            {{Form::text('lien_dossier_complet_insee','', ['class' => 'form-control'])}}
          </div>


          <div class="form-group col-md-6">
            {{Form::label('lien_admin_francaise', 'Site officiel de l’administration Française (Service-Public.fr) :')}}
            {{Form::text('lien_admin_francaise','', ['class' => 'form-control'])}}
          </div>


          <div class="form-group col-md-6">
            {{Form::label('lien_asso_maires', 'L’association des maires de France :')}}
            {{Form::text('lien_asso_maires','', ['class' => 'form-control'])}}
          </div>

           <div class="form-group col-md-6">
          {{Form::label('lien_synth_risques', 'Fiche de synthèse des risques :')}}
          {{Form::text('lien_synth_risques','', ['class' => 'form-control'])}}
        </div>

        </div>
      </div>
    </div>




    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Maire
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="form-group col-md-2">
              {{Form::label('civilite_maire', 'Civilité')}}
              {{Form::text('civilite_maire', '', ['class' => 'form-control'])}}
            </div>
            <div class="form-group col-md-6">
              {{Form::label('nom_maire', 'Nom')}}
              {{Form::text('nom_maire', '', ['class' => 'form-control'])}}
            </div>
            <div class="form-group col-md-4">
              {{Form::label('prenom_maire', 'Prénom')}}
              {{Form::text('prenom_maire', '', ['class' => 'form-control'])}}
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-2">
              {{Form::label('telephone', 'Téléphone')}}
              {{Form::text('telephone','' , ['class' => 'form-control'])}}
            </div>
            <div class="form-group col-md-2">
              {{Form::label('fax', 'Fax')}}
              {{Form::text('fax','' , ['class' => 'form-control'])}}
            </div>
            <div class="form-group col-md-4">
              {{Form::label('email1', 'Email1')}}
              {{Form::text('email1','' , ['class' => 'form-control'])}}
            </div>
            <div class="form-group col-md-4">
              {{Form::label('email2', 'Email2')}}
              {{Form::text('email2','' , ['class' => 'form-control'])}}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Périmètres de gouvernance
        </div>
        <div class="panel-body">
          <div class="form-group col-md-4">
            {{Form::label('id_epci', 'EPCI : ')}}
            {{Form::select('id_epci', $epcis,null, ['placeholder' => 'Sélectionner un EPCI', 'class' => 'form-control'])}}
          </div>
          <div class="form-group col-md-4">
            {{Form::label('id_terri38', 'Territoire38 : ')}}
            {{Form::select('id_terri38', $territoires ,null, ['placeholder' => 'Sélectionner un territoire', 'class' => 'form-control'])}}
          </div>
          <div class="form-group col-md-4">
            {{Form::label('id_scot', 'SCOT : ')}}
            {{Form::select('id_scot', $scots ,null, ['placeholder' => 'Sélectionner un SCOT', 'class' => 'form-control'])}}
          </div>

        </div>
      </div>
    </div>
   
  </div>