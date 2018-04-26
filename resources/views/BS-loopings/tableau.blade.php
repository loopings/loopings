@extends('layouts.master')
@section('title')
  Titre de la page
@endsection
@section('subtitle')
  Sous titre de la page
@endsection
@section('content')
  <div class="col-md-4 col-md-offset-4">
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <p>Une erreur s'est produite avec les message suivant : {{$erreur}}</p>
        <p>
          <a href="mailto:sidsic-support-ddt@isere.gouv.fr?subject=Erreur Loopings&body={{$erreur}}" class="alert-link">
            Signaler cette erreur au support
          </a>
        </p>
    </div>
  </div>
  <div class="col-md-12">
    <table class="table table-striped table-bordered table-hover">
      <thead>
          <tr>
              <th>#</th>
              <th>Prénom</th>
              <th>Nom</th>
              <th>Username</th>
              <th colspan="3">Actions</th>
          </tr>
      </thead>
      <tbody>
          <tr>
              <td>1</td>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td><a href="maj/Otto/Mark/@mdo/1"><span class="fa fa-edit"> </span></a></td>
              <td><a href="#"><span class="glyphicon glyphicon-remove"> </span></a></td>
          </tr>
          <tr>
              <td>2</td>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
              <td><a href="maj/Jacob/Thornton/@fat/2"><span class="fa fa-edit"> </span></a></td>
              <td><a href="#"><span class="glyphicon glyphicon-remove"> </span></a></td>
          </tr>
          <tr>
              <td>3</td>
              <td>Larry</td>
              <td>the Bird</td>
              <td>@twitter</td>
              <td><a href="maj/Larry/the Bird/@twitter/3"><span class="fa fa-edit"> </span></a></td>
              <td><a href="#"><span class="glyphicon glyphicon-remove"> </span></a></td>
          </tr>
      </tbody>
    </table>
  </div>
  <div class="col-md-3">
    <div class="dataTables_info" id="dataTables-example_info" role="status" aria-live="polite">
      <a href="creer" class="btn btn-success">Ajouter</a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="dataTables_info" id="dataTables-example_info" role="status" aria-live="polite">
      <h4>Affichage de X enregistrements sur un total de Y</h4>
    </div>
  </div>
  <div class="col-md-6">
    <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
      <ul class="pagination">
        <li class="paginate_button previous disabled" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_previous">
          <a href="#">Précédent</a>
        </li>
        <li class="paginate_button active" aria-controls="dataTables-example" tabindex="0">
          <a href="#">1</a>
        </li>
        <li class="paginate_button " aria-controls="dataTables-example" tabindex="0">
          <a href="#">2</a>
        </li>
        <li class="paginate_button " aria-controls="dataTables-example" tabindex="0">
          <a href="#">3</a>
        </li>
        <li class="paginate_button " aria-controls="dataTables-example" tabindex="0">
          <a href="#">4</a>
        </li>
        <li class="paginate_button " aria-controls="dataTables-example" tabindex="0">
          <a href="#">5</a>
        </li>
        <li class="paginate_button " aria-controls="dataTables-example" tabindex="0">
          <a href="#">6</a>
        </li>
        <li class="paginate_button next" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_next">
          <a href="#">Suivant</a>
        </li>
      </ul>
    </div>
  </div>
@endsection
