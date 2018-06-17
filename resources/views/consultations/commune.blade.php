<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="/consultations/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/consultations/img/logo_loopings.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>LOOPINGS</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
  <!-- CSS Files -->
  
  

  <link href="/consultations/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/consultations/css/bootstrap.css" rel="stylesheet" />
  <link href="/consultations/css/bootstrap-theme.css" rel="stylesheet" />
  <link href="/consultations/css/now-ui-kit.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="/consultations/css/app.css" rel="stylesheet" />


  <script src="/consultations/js/ancres/jquery.js" type="text/javascript"></script><!-- Insertion de la bibliotheque jQuery -->

  <script>
    $(document).ready(function() {
        $('a[href*="anchor-"]').click( function() { // Au clic sur un élément
            var page = $(this).attr('href'); // Page cible
            var ancre = page.replace('#','');
            var coordonnees = $('a[name="' + ancre + '"]').offset().top;
            var speed = 1000; // Durée de l'animation (en ms)
            $('html, body').animate( { scrollTop: coordonnees }, speed ); // Go
            return false;
          });
      });
    </script>

    <script >


      $(".list-group a").click(function(e) {
       $(".list-group a").removeClass("active");
       $(e.target).addClass("active");
     });



   </script>

   <script type="text/javascript" src="/consultations/js/ancres/lancement.js"></script><!-- permet le lancement de la fonction de scroll -->
  


 </head>

 <body class="index-page">
  <!-- Navbar -->
  <nav class="navbar navbar-toggleable-md bg-light fixed-top"  style="background-color: #6D0742;max-height: 60px;" >
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="/">
          <img class="n-logo " src="/consultations/img/logo_loopings.png" alt="" style="width: 10%;">
          LOOPINGS
        </a>
      </div>

      <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="/consultations/img/blurred-image-1.jpg">
        <ul class="navbar-nav">
          @if (Auth::guest())
          <li class="nav-item">
            <a class="nav-link" href="/">
              <i class="now-ui-icons users_single-02"></i>
              <p>Connexion</p>
            </a>
          </li>

          @else

          <li class="nav-item">
            <a  class="nav-link" href="/admin" >
              {{ Auth::user()->name }}-admin
            </a>

          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>



  <!-- End Navbar -->
  <div class="wrapper">
    <div class="main">
      @if($comm->commune_etat='fusionée' && !empty($resultat_fusion) )
      <br><br><br><br>
      <div class="container">
        <div class="col-md-12">   
          <div class="card card-inverse card-danger text-center" style="max-height: 150px;">
            <div class="card-block">
              <h4 class="card-title"><i class="glyphicon glyphicon-warning-sign"></i></h4>
              <blockquote class="card-blockquote">
                <p>La commune {{$comm->nom_comm}} a été fusionnée .<br> La commune résultante est <a href="/commune/{{$resultat_fusion->id}}" style="color:white"><cite title="Source Title">{{$resultat_fusion->nom_comm}}</cite></a></p>

              </blockquote>
            </div>
          </div>
        </div>
      </div>
      @endif

      <div class="section section-communes">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h1 style=" font-family: inherit;font-weight: 500;line-height: 1.1;color: inherit;">{{$comm->nom_comm}}({{$comm->code_insee}})</h1>


              <div class="card" style="width: 1200px;">
                <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="blue" style="width: 1200px; background-color: #6D0742; " >
                  <li class="nav-item" style="width: 150px; text-align: center;">
                    <a class="nav-link active" data-toggle="tab" href="#fiche" role="tab">
                      <span class="glyphicon glyphicon-list-alt" ></span><br> Fiche administrative et données générales
                    </a>
                  </li>
                  <li class="nav-item" style="width: 150px; text-align: center;">
                    <a class="nav-link" data-toggle="tab" href="#ressource" role="tab">
                      <i class="glyphicon glyphicon-picture"></i><br>  Ressources naturelles et paysagères
                    </a>
                  </li>
                  <li class="nav-item" style="width: 150px; text-align: center;">
                    <a class="nav-link" data-toggle="tab" href="#urbanisme" role="tab">
                      <i class="glyphicon glyphicon-road"></i><br>  Urbanisme et risques
                    </a>
                  </li>
                  
                  <li class="nav-item" style="width: 150px; text-align: center;">
                    <a class="nav-link" data-toggle="tab" href="#eauf" role="tab">
                      <i class="glyphicon glyphicon-tree-deciduous"></i><br>  Eaux et Forêts
                    </a>
                  </li>

                  <li class="nav-item" style="width: 150px; text-align: center;">
                    <a class="nav-link" data-toggle="tab" href="#logement" role="tab">
                      <i class="now-ui-icons business_bank"></i><br>  Logement et politique de la ville
                    </a>
                  </li>

                <li class="nav-item" style="width: 150px; text-align: center;">
                    <a class="nav-link" data-toggle="tab" href="#agriculture" role="tab">
                      <i class="glyphicon glyphicon-grain"></i><br>  Agriculture
                    </a>
                  </li>

                  <li class="nav-item" style="width: 150px; text-align: center;">
                    <a class="nav-link" data-toggle="tab" href="#air" role="tab">
                      <i class="glyphicon glyphicon-leaf"></i><br>  Transition énergétique et Déplacements
                    </a>
                  </li>

                  <li class="nav-item" style="width: 150px; text-align: center;">
                    <a class="nav-link" data-toggle="tab" href="#foncier" role="tab">
                      <i class="glyphicon glyphicon-home"></i> <br> Foncier
                    </a>
                  </li>
                </ul>
                <div class="card-block" style="background-color: #FFFAF0;">
                  <!-- Tab panes -->
                  <div class="tab-content text-center">
                    <div class="tab-pane active" id="fiche" role="tabpanel">

                     @include ('consultations.communeTheme1')

                   </div>

                   <div class="tab-pane" id="ressource" role="tabpanel">

                    @include ('consultations.communeTheme2')

                  </div>

                  <div class="tab-pane" id="urbanisme" role="tabpanel">
                    @include ('consultations.communeTheme3')

                    ])

                  </div>
                  <div class="tab-pane" id="eauf" role="tabpanel">
                    @include ('consultations.communeTheme4')

                  </div>

                  <div class="tab-pane" id="logement" role="tabpanel">

                    @include ('consultations.communeTheme5')
                  </div>

                  <div class="tab-pane " id="agriculture" role="tabpanel">

                   @include ('consultations.communeTheme6')

                 </div>

                 <div class="tab-pane " id="air" role="tabpanel">

                   @include ('consultations.communeTheme7')

                 </div>

                 <div class="tab-pane " id="foncier" role="tabpanel">

                   @include ('consultations.communeTheme8')

                 </div>
               </div>

             </div>
           </div>
         </div>


       </div>
     </div>
   </div>
 </div>
</div>
</div>

<footer class="footer" data-background-color="black">
  <div class="container">
    <nav>

    </nav>
    <div class="copyright">
      <script>
        document.write(new Date().getFullYear())
      </script>, Design inspiré de
      <a href="http://www.invisionapp.com" target="_blank">Invision</a>/ Conception et codage SIDSIC38 - Malek Mehamsadji
    </div>
  </div>
</footer>
</div>
</body>
<!--   Core JS Files   -->
<script src="/consultations/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="/consultations/js/core/tether.min.js" type="text/javascript"></script>
<script src="/consultations/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="/consultations/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="/consultations/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="/consultations/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="/consultations/js/now-ui-kit.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function() {
        // the body of this function is in assets/js/now-ui-kit.js
        nowuiKit.initSliders();
      });

  function scrollToCommunes() {

    if ($('.section-communes').length != 0) {
      $("html, body").animate({
        scrollTop: $('.section-communes').offset().top
      }, 1000);
    }
  }

  function scrollToEPCI() {

    if ($('.section-EPCI').length != 0) {
      $("html, body").animate({
        scrollTop: $('.section-EPCI').offset().top
      }, 1000);
    }
  }

  function scrollToLogin() {

    if ($('.section-login').length != 0) {
      $("html, body").animate({
        scrollTop: $('.section-login').offset().top
      }, 1000);
    }
  }
</script>

</html>
