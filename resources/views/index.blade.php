<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Loopings-administrateur</title>

  <!-- Bootstrap Core CSS -->
  <link href="/BST/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="/BST/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="/BST/dist/css/sb-admin-22.css" rel="stylesheet">

  <!-- Morris Charts CSS -->
  <link href="/BST/vendor/morrisjs/morris.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="/BST/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


  <!-- Bootstrap Datepicker -->
  <link href="/BST/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">



  <!-- DataTables CSS -->
  <link href="/BST/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

  <!-- DataTables Responsive CSS -->
  <link href="/BST/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">


  <!-- JQuery MultiSelect -->
  <link href="/BST/dist/css/multi-select.css" rel="stylesheet">

  <!-- JQuery select -->
  <link href="/BST/dist/css/bootstrap-select.min.css" rel="stylesheet">

</head>

<body>


  <div id="wrapper" style="background-color: white;">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background-color: #af3e27;" >
      <div class="navbar-header" >
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/admin" style="color: white;"
        >Administrateur</a>
      </div>
      <!-- /.navbar-header -->

      <ul class="nav navbar-top-links navbar-right">
        <!-- Authentication Links -->
        @if (Auth::guest())
        <li><a href="{{ route('login') }}"  style="color: white;">Connexion</a></li>
        @else
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color: white;">
            {{ Auth::user()->name }} <span class="caret"></span>
          </a>

          <ul class="dropdown-menu" role="menu" >
            <li>
              <a href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();" >
              <span class="fa fa-power-off fa-fw"></span>Déconnexion
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </li>
        </ul>
      </li>
      @endif
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
      <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
          <br><br>
          <li>
            <a href="/"><i class="fa fa-arrow-left fa-fw"></i>Accueil-Utilisateurs</a>
          </li>
          <br>
          <li>
            <a href="/admin"><i class="fa fa-dashboard fa-fw"></i> Accueil-Thèmes</a>
          </li>

          <li>
            <a href="#">Fiche administrative<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">

              <li>
                <a href="/comm">Communes</a>
              </li>

               <li>
                <a href="/epci">EPCI</a>
              </li>

              <li>
                <a href="/canton">Cantons</a>
              </li>

              <li>
                <a href="/agent_car">Responsable des risques</a>
              </li>

              <li>
                <a href="/cham">Chargé de planification</a>
              </li>

              <li>
                <a href="/scot">SCOT</a>
              </li>

              <li>
                <a href="/territoire">Territoire 38</a>
              </li>
              <li>
                <a href="/population">Population</a>
              </li>


            </ul>
            <!-- /.nav-second-level -->
          </li>

          <li>
            <a href="#">Ressources naturelles et paysagères<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">

              <li>
                <a href="/appb">APPB</a>
              </li>
                <li>
                <a href="/reserve">Reserve</a>
              </li>

              <li>
                <a href="/icpe">ICPE</a>
              </li>


              <li>
                <a href="/pnr">PNR</a>
              </li>

              <li>
                <a href="/znieff">ZNIEFF</a>
              </li>
              <li>
                <a href="/natura2000">Natura 2000</a>
              </li>
            </ul>
          </li>

          <li>
            <a href="#">Urbanisme risques et déplacements <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">

              <li>
                <a href="/ze">Zones d'emplois</a>
              </li>

              <li>
                <a href="/dta">DTA</a>
              </li>
              <li>
                <a href="/au">Aires urbaines</a>
              </li>

              <li>
                <a href="/uu">Unités urbaines</a>
              </li>

              <li>
                <a href="/zp">ZP</a>
              </li>

              <li>
                <a href="/plui">PLUI</a>
              </li>


            </ul>
            <!-- /.nav-second-level -->
          </li>


          <li>
            <a href="#">Eau et forêts <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">

              <li>
                <a href="/barrage">Barrages</a>
              </li>

              <li>
                <a href="/cf">Chartes forestières</a>
              </li>
              <li>
                <a href="/cm">Contrats milieux</a>
              </li>

               <li>
                <a href="/contactcm">Contacts contrats milieux</a>
              </li>

              <li>
                <a href="/digue">Digues</a>
              </li>

              <li>
                <a href="/sage">SAGE</a>
              </li>

              <li>
                <a href="/step">STEP</a>
              </li>

               <li>
                <a href="/cheau">Cheau</a>
              </li>

               <li>
                <a href="/hydroelec">Hydroelec</a>
              </li>

              <li>
                <a href="/conteco">Conteco</a>
              </li>

              <li>
                <a href="/contdigba">Contdigba</a>
              </li>
              <li>
                <a href="/captage">Captage</a>
              </li>
              <li>
                <a href="/resstrat">Resstrat</a>
              </li>
              <li>
                <a href="/gemapi">Gemapi</a>
              </li>
              <li>
                <a href="/colcompeaup">colcompeaup</a>
              </li>
              <li>
                <a href="/colgestass">colgestass</a>
              </li>
              <li>
                <a href="/colgesteaup">colgesteaup</a>
              </li>
              <li>
                <a href="/colcompeauu">colcompeauu</a>
              </li>

            </ul>
            <!-- /.nav-second-level -->
          </li>

          <li>
            <a href="#">Logement et politique de la ville <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">

              <li>
                <a href="/cucs">CUCS</a>
              </li>

              <li>
                <a href="/quartier">Quartiers cus non zus</a>
              </li>
              <li>
                <a href="/zus">Zones urbaines sensibles</a>
              </li>

              <li>
                <a href="/logement">Logements</a>
              </li>


            </ul>
            <!-- /.nav-second-level -->
          </li>

          <li>
            <a href="#">Agriculture <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">

              <li>
                <a href="/agriculture">Agriculture</a>
              </li>
              <li>
                <a href="/aocaop">AOC et AOP</a>
              </li>

            
            </ul>


            <!-- /.nav-second-level -->
          </li>



          <li>
            <a href="#">Air et bruit<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">

              <li>
                <a href="/pcaet">PCAET</a>
              </li>
              <li>
                <a href="/tepospepcv">TEPOS et PEPCV</a>
              </li>
              <li>
                <a href="/pfre">PFRE</a>
              </li>
              <li>
                <a href="/troncons">Tronçons</a>
              </li>
            </ul>


            <!-- /.nav-second-level -->
          </li>


          <li>
            <a href="#">Foncier<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">

              <li>
                <a href="/logementc">Logements commencés</a>
              </li>

            </ul>


            <!-- /.nav-second-level -->
          </li>
          <li>
            <a href="#">Liens utiles<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">

              <li>
                <a href="/lien">Liens uniques</a>
              </li>


            </ul>

            <!-- /.nav-second-level -->
          </li>
	  <li>
		<a href="/users">Gestion des utilisateurs</a>
	  </li>
        </ul>
      </div>
      <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
  </nav>




  <div id="page-wrapper" style="min-height: 92.25vh;">

    <br> <br>
    <div class="content-main">

      <div class="panel panel-danger">

        <div class="panel-heading">
          <h1 class="panel-title">Association</h1>
        </div>




        <!-- /.col-lg-12 -->

        <div class="panel-body">
          Veuillez sélectionner une commune que vous pourriez associer à
          <ul>
            <li>Un canton</li>
            <li>Un APPB</li>
            <li>Une ICPE</li>
            <li>Une zone natura 2000</li>
            <li>Une zone ZNIEFF</li>
            <li>Une zone ZP</li>
            <li>Une charte forestière</li>
            <li>Un contrat rivière</li>
            <li>Un SAGE</li>
            <li>Une STEP</li>
          </ul>
          <div class="col-lg-6">

            {{Form::open(['url' => '/assoc', 'method' => 'post'])}}
            {{Form::select('idsearch', $search_comm,null, ['placeholder' => 'Rechercher une commune', 'class' => 'selectpicker','data-live-search'=> 'true'])}}
            <button class="btn btn-link btn-lg" type="submit">
              <span class="glyphicon glyphicon-search "></span>
            </button>
            {{Form::close()}}
            <br>
          </div>
        </div>
      </div>


      <div class="panel panel-success">

        <div class="panel-heading">
          <h1 class="panel-title">Ajouter un administrateur</h1>
        </div>




        <!-- /.col-lg-12 -->

        <div class="panel-body">

        </div>
      </div>

    </div>



  </div>
  <!-- /#page-wrapper -->


  <!-- /#wrapper -->


</div>

<footer class="footer" style="background-color: black;text-align: right;">
  <div class="container">
    <nav>

    </nav>
    <div class="copyright" style="color: white;">
      <script>
        document.write(new Date().getFullYear())
      </script>, Design inspiré de
      <a href="http://www.invisionapp.com" target="_blank" >Invision</a>/ Conception et codage SIDSIC38 - Malek Mehamsadji
    </div>
  </div>
</footer>
<!-- jQuery -->
<script src="/BST/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/BST/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="/BST/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="/BST/vendor/raphael/raphael.min.js"></script>
<script src="/BST/vendor/morrisjs/morris.min.js"></script>
<script src="/BST/data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="/BST/dist/js/sb-admin-2.js"></script>
<!-- DatePicker -->
<script src="/BST/dist/js/bootstrap-datepicker.min.js"></script>
<script src="/BST/dist/js/bootstrap-datepicker.fr.min.js"></script>
<!--JQuery MultiSelect-->
<script src="/BST/dist/js/jquery.multi-select.js"></script>

<!--JQuery checkbox-->
<script src="/BST/dist/js/bootstrap-checkbox.js"></script>

<!--JQuery select-->
<script src="/BST/dist/js/bootstrap-select.js"></script>

<script type="text/javascript">
  @yield('javascript')
</script>

</body>

</html>
