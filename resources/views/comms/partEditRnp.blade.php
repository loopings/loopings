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

    
    
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Eaux et forets
        </div>
        <div class="panel-body">
          <div class="form-group col-md-4">
            {{Form::label('zone_nitrate', 'Zone nitrate : ')}}
            {{Form::text('zone_nitrate', $comm->zone_nitrate, ['class' => 'form-control'])}}
          </div>

          <div class="form-group col-md-4">
            {{Form::label('captage_prioritaire', 'Captage prioritaire : ')}}
            {{Form::text('captage_prioritaire', $comm->captage_prioritaire, ['class' => 'form-control'])}}
          </div>
          <div class="form-group col-md-4">
            {{Form::label('sdage_deficit_aver', 'Commmune concernée par un SDAGE en deficit avéré : ')}}
            {{Form::text('sdage_deficit_aver', $comm->sdage_deficit_aver, ['class' => 'form-control'])}}
          </div>
          <div class="form-group col-md-4">
            {{Form::label('pgre', 'PGRE : ')}}
            {{Form::text('pgre', $comm->pgre, ['class' => 'form-control'])}}
          </div>
          <div class="form-group col-md-5">
            {{Form::label('sdage_equi_frag', 'Commmune concernée par un SDAGE en équilibre fragile : ')}}
            {{Form::text('sdage_equi_frag', $comm->sdage_equi_frag, ['class' => 'form-control'])}}
          </div>
          <div class="form-group col-md-3">
            {{Form::label('id_gemapi', 'GEMAPI: ')}}
            {{Form::select('id_gemapi', $gemapis ,null, ['placeholder' => 'Sélectionner GEMAPI', 'class' => 'form-control'])}}
          </div>
          <div class="form-group col-md-6">
            {{Form::label('id_cheau', 'Contact DDT chargé police de l\'eau: ')}}
            {{Form::select('id_cheau', $cheaus ,null, ['placeholder' => 'Sélectionner contact', 'class' => 'form-control'])}}
          </div>

          <div class="form-group col-md-6">
            {{Form::label('id_hydroelec', 'Contact DDT pour l\'hydoélectricité: ')}}
            {{Form::select('id_hydroelec', $hydroelecs ,null, ['placeholder' => 'Sélectionner contact', 'class' => 'form-control'])}}
          </div>
          <div class="form-group col-md-6">
            {{Form::label('id_eco', 'Contact DDT sur les questions de continuité écologique  : ')}}
            {{Form::select('id_eco', $contecos ,null, ['placeholder' => 'Sélectionner contact', 'class' => 'form-control'])}}
          </div>
          <div class="form-group col-md-6">
            {{Form::label('id_contdigba', 'Contact DDT pour digues et barrages : ')}}
            {{Form::select('id_contdigba', $contdigbas ,null, ['placeholder' => 'Sélectionner contact', 'class' => 'form-control'])}}
          </div>

          <div class="form-group col-md-4">
           {{ Form::label('tx_bois', ' Taux de boisement : ') }}
           {{ Form::text('tx_bois',$comm->tx_bois, array('class' => 'form-control')) }}
         </div>

         <div class="form-group col-md-4">
           {{ Form::label('existence_reg_bois', ' Existence réglementation boisement : ') }}
           {{ Form::text('existence_reg_bois',$comm->existence_reg_bois, array('class' => 'form-control')) }}
         </div>

         <div class="form-group col-md-4">
           {{ Form::label('existence_for_prot', ' Existence forêt protection : ') }}
           {{ Form::text('existence_for_prot',$comm->existence_for_prot, array('class' => 'form-control')) }}
         </div>

       </div>
     </div>
   </div>
 </div>