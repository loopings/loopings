<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>
    Loopings -@yield('title')
  </title>
  <link rel="stylesheet" type="text/css" href="/css/loopings.css">
  <!-- Bootstrap Core CSS -->
  <link href="/BST/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  

  <!-- Bootstrap Datepicker -->
  <link href="/BST/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="/BST/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- DataTables CSS -->
  <link href="/BST/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

  <!-- DataTables Responsive CSS -->
  <link href="/BST/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="/BST/dist/css/sb-admin-2.css" rel="stylesheet">

  <!-- Morris Charts CSS -->
  <link href="/BST/vendor/morrisjs/morris.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="/BST/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- JQuery MultiSelect -->
  <link href="/BST/dist/css/multi-select.css" rel="stylesheet">

  <!-- JQuery select -->
  <link href="/BST/dist/css/bootstrap-select.min.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->



      </head>

      <body>

       

          <!-- Navigation -->
          @include('layouts.nav')

          <div id="page-wrapper">
            <div class="row">
              <div class="col-lg-12">
                <h1 class="page-header">
                  <a href="@yield('route')"> @yield('title') </a><small>@yield('subtitle')</small>
                </h1>
              </div>
              <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-lg-12">
                @yield('content')
              </div>
            </div>
          </div>
          <!-- /#page-wrapper -->
      
        <!-- /#wrapper -->

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
