<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background-color: #337ab7;">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/admin" style="color: white;">Loopings v2.0-admin </a>
    </div>
    <!-- /.navbar-header -->

<ul class="nav navbar-top-links navbar-right">
      <!-- Authentication Links -->
      @if (Auth::guest())
          <li><a href="{{ route('login') }}" style="color: white;">Connexion</a></li>
      @else
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color: white;">
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <ul class="dropdown-menu" role="menu">
                  <li>
                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
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



</nav>
