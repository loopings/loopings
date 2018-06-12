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
  
  
  
  <link href="/consultations/css/now-ui-kit.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="/consultations/css/app.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="/consultations/js/chosen/component-chosen.css"/>
  <!-- JQuery select -->
  <script src="/consultations/js/ancres/jquery.js" type="text/javascript"></script>
  <script type="text/javascript" src="/consultations/js/chosen/chosen.jquery.js"></script>
 
  
</head>

<body class="index-page">
  <!-- Navbar -->
  <nav class="navbar navbar-toggleable-md  fixed-top navbar-transparent " color-on-scroll="500" style="background-color: #6D0742;">
    <div class="container">
      <div class="navbar-translate">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
        <a class="navbar-brand" href="/">
          LOOPINGS
        </a>
      </div>
      <div class="navbar-translate">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="/consultations/img/blurred-image-1.jpg">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)" onclick="scrollToCommunes()">
              <i class="now-ui-icons business_bank"></i>
              <p>Communes</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)" onclick="scrollToEPCI()">
              <i class="now-ui-icons design_vector"></i>
              <p>EPCI</p>
            </a>
          </li>

          @if (Auth::guest())
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)" onclick="scrollToLogin()">
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
    <div class="page-header clear-filter" >
      <div class="page-header-image" data-parallax="true" style="background-image: url('/consultations/img/header.jpg');">
      </div>
      <div class="container">
        <div class="content-center brand">
          <img class="n-logo" src="/consultations/img/logo_loopings.png" alt="">

          <h3>L'OUTIL OP&Eacute;RANT un PARTAGE de l'INFORMATION G&Eacute;N&Eacute;RALIS&Eacute; à tous les SERVICES</h3>
          <h3>Choisissez l'échelle de la donnée :</h3>
          <h4><a class="nav-link" href="javascript:void(0)" onclick="scrollToCommunes()" style="color: white;"><i class="now-ui-icons business_bank"></i> Communes</a></h4>
          <h4><a class="nav-link" href="javascript:void(0)" onclick="scrollToEPCI()" style="color: white;"><i class="now-ui-icons design_vector"></i> EPCI</a></h4>
        </div>
        <h6 class="category category-absolute">
          <a href="http://invisionapp.com/" target="_blank">
            <img src="/consultations/img/marianne.jpg" class="invision-logo" />
          </a>
          <p>DDT de l'Isère. Conception et codage SIDSIC38/Malek Mehamsadji.</p>
        </h6>
      </div>
    </div>
    <div class="main">
      <div class="section section-communes">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h1>Communes</h1>
              <div class="col-md-6">


<form method="POST" action="/commune" accept-charset="UTF-8" style="white-space: nowrap;">
               


                
                {{Form::select('idsearch', $search_comm,null, ['placeholder' => 'Rechercher une commune', 'class'=>'form-control chosen-select'])}}
                {{ csrf_field() }}

                <button class="btn btn-link btn-lg" type="submit">
                  <span class="now-ui-icons ui-1_zoom-bold "></span>
                </button>
               </form>  
                 
                

              </div>
              <div class="col-md-3">
                
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="section section-EPCI">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h1>EPCI</h1>
            </div>
          </div>
        </div>
      </div>

      @if (Auth::guest())
      <div class="section section-login">
        <div class="container" >
          <div class="row">
            <div class="col-md-4 offset-md-4" >
              <div class="card card-signup" style="background-color: #D0BF16;" >
                <form class="form" method="POST" action="/login">
                  {{ csrf_field() }}
                  <div class="header header-primary text-center">
                    <h4 class="title title-up">Connexion</h4>
                  </div>
                  <div class="content">
                    <div class="input-group form-group-no-border">
                      <span class="input-group-addon">
                        <i class="now-ui-icons users_circle-08"></i>
                      </span>
                      <input id="email" type="email" class="form-control" name="email" placeholder="Adresse mail..." type="text" required>
                    </div>
                    <div class="input-group form-group-no-border">
                      <span class="input-group-addon">
                        <i class="now-ui-icons ui-1_lock-circle-open"></i>
                      </span>
                      <input id="password" placeholder="Mot de passe..." class="form-control" type="password" name="password" required>
                    </div>
                  </div>
                  <div class="footer text-center">
                    <input type="submit" class="btn btn-neutral btn-round btn-lg" label="Connexion">
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
      </div>
      @endif


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
  <script src="/consultations/js/chosen/docsupport/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="/consultations/js/chosen/chosen.jquery.js" type="text/javascript"></script>
  <script src="/consultations/js/chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
  <script src="/consultations/js/chosen/docsupport/init.js" type="text/javascript" charset="utf-8"></script>
  <!--   Core JS Files   -->
  <script src="/consultations/js/core/tether.min.js" type="text/javascript"></script>
  <script src="/consultations/js/core/popper.js" type="text/javascript"></script>
  <script src="/consultations/js/core/bootstrap.min.js" type="text/javascript"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->

  <script src="/consultations/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="/consultations/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="/consultations/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
  <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
  <script src="/consultations/js/now-ui-kit.js" type="text/javascript"></script>
  <script src="/BST/dist/js/bootstrap-checkbox.js"></script>
  
  <!--JQuery select-->
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
