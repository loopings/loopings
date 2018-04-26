@extends('layouts.master')

@section('title')
create 
@endsection

@section('content')


<br><br>



<form action="/epci" method="POST">
  {{Form::hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
  
    {{Form::label(' Nom de l'epci','')}} 
    {{Form::text(' nom_groupement  

    {{Form::label(' Type de l'epci  ','')}} 
    {{Form::text(' type_epci  

    {{Form::label('  Code siren ','')}} 
    {{Form::text(' code_siren  

    {{Form::label('  Civilité du président ','')}} 
    {{Form::text(' civilite  

    {{Form::label('   Prénom du président','')}} 
    {{Form::text(' prenom_president  

    {{Form::label('  Nom du président ','')}} 
    {{Form::text(' nom_president  

    {{Form::label('  Adresse du siège ','')}} 
    {{Form::text(' adresse_siege  

    {{Form::label('  Code postal ','')}} 
    {{Form::text(' code_postal  

    {{Form::label('  Tel ','')}} 
    {{Form::text(' tel  

    {{Form::label('  Fax ','')}} 
    {{Form::text(' fax  

    {{Form::label('  Courriel ','')}} 
    {{Form::text(' courriel  

    {{Form::label('  Site internet ','')}} 
    {{Form::text(' site_internet  


    {{Form::label('   Vulnerabilité énergétique','')}} 
    {{Form::text(' vulnerabilite_energetique  

    {{Form::label('  Libellé du pdu ','')}} 
    {{Form::text(' libelle_pdu  

    {{Form::label(' L'état d'avancement du pdu  ','')}} 
    {{Form::text(' etat_avancement_pdu  

    {{Form::label('   Date de validation du pdu ','')}} 
    {{Form::text(' date_validation_pdu  

    {{Form::label('  Lien vers doc pdu ','')}} 
    {{Form::text(' lien_doc_pdu  

    {{Form::label('   Libellé du plh ','')}} 
    {{Form::text(' libelle_plh  

    {{Form::label('  L'état d'avancement du plh ','')}} 
    {{Form::text(' etat_avancement_plh  

    {{Form::label('   Date de validation du plh ','')}} 
    {{Form::text(' date_validation_plh  

    {{Form::label('  Lien vers doc plh ','')}} 
    {{Form::text(' lien_doc_plh  

    {{Form::label('  doc ofpi ','')}} 
    {{Form::text(' doc_ofpi  

    {{Form::label('  video epci foncier ','')}} 
    {{Form::text(' video_epci_foncier  

    {{Form::label(' Etat  ','')}} 
    {{Form::text(' etat  

    {{Form::label('  Resultat fusion ','')}} 
    {{Form::text(' resultat_fusion  

    <br><br>
    <button type="submit" class="btn btn-default">Submit</button>


  </div>
</form>

@endsection
