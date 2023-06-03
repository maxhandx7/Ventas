<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  {!! Html::style('melody/vendors/iconfonts/font-awesome/css/all.min.css') !!}
  {!! Html::style('melody/vendors/css/vendor.bundle.base.css') !!}
  {!! Html::style('melody/vendors/css/vendor.bundle.addons.css') !!}
  {!! Html::style('melody/css/style.css') !!}
  @yield('styles')
  <link rel="shortcut icon" href="{{asset('melody/images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="/"><img src="{{asset('melody/images/logo.svg')}}" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="/"><img src="{{asset('melody/images/logo-mini.svg')}}" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="fas fa-bars"></span>
        </button>
        <ul class="navbar-nav">
          <li class="nav-item nav-search d-none d-md-flex">
            <div class="nav-link">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-search"></i>
                  </span>
                </div>
                <input type="text" class="form-control" placeholder="Buscar" aria-label="Search">
              </div>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item d-none d-lg-flex">
          </li>
          <li class="nav-item dropdown d-none d-lg-flex">
          </li>
          <li class="nav-item dropdown">
          </li>
          <li class="nav-item dropdown">
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="/" data-toggle="dropdown" id="profileDropdown">
              <img src="{{asset('image/'.$business->logo)}}" alt="profile" />
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('business.index')}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout">
                <i class="fas fa-briefcase text-primary"></i>
                {{$business->name}}
              </a>
              <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                <i class="fas fa-power-off text-primary"></i>
                Salir
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="fas fa-bars"></span>
        </button>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
      @yield('preference')
      <!-- <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="fas fa-fill-drip"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close fa fa-times"></i>
          <p class="settings-heading">Color barra lateral</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
          </div>
          <p class="settings-heading mt-2">Color del Head</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles primary"></div>
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div> -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="profile-image">
                <img src="{{asset('image/'.$business->logo)}}" alt="image" />
              </div>
              <div class="profile-name">
                <p class="name">
                  {{$saludo}} {{ Auth::user()->name }}
                </p>
                <p class="designation">
                  {{ Auth::user()->email }}
                </p>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home')}}">
              <i class="fa fa-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('clients.index')}}">
              <i class="fa fa-user  menu-icon"></i>
              <span class="menu-title">Tus Clientes</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('sales.index')}}">
              <i class="fa fa-money-bill menu-icon"></i>
              <span class="menu-title">Tus ventas</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('purchases.index')}}">
              <i class="fa fa-shopping-cart menu-icon"></i>
              <span class="menu-title">Tus Compras</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('products.index')}}">
              <i class="fa fa-archive menu-icon"></i>
              <span class="menu-title">Tus Productos</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('providers.index')}}">
              <i class="fa fa-truck menu-icon"></i>
              <span class="menu-title">Tus Proveedores</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('categories.index')}}">
              <i class="fa fa-list menu-icon"></i>
              <span class="menu-title">Tus Categorias</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
              <i class="fas fa-cog menu-icon"></i>
              <span class="menu-title">Configuracion</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('business.index')}}">Empresa</a></li>

                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('printers.index')}}">Impresora</a></li>


              </ul>
            </div>
          </li>
          <li class="nav-item d-none d-lg-block">
            <a class="nav-link" data-toggle="collapse" href="#sidebar-layouts" aria-expanded="false" aria-controls="sidebar-layouts">
              <i class="fas fa-users menu-icon"></i>
              <span class="menu-title">Gestion de usuarios</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="sidebar-layouts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('users.index')}}">Usuarios</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('roles.index')}}">Roles</a></li>

              </ul>
            </div>
          </li>

          <li class="nav-item d-none d-lg-block">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="fas fa-chart-line menu-icon"></i>
              <span class="menu-title">Reportes</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('reports.day')}}">Reportes por día</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('reports.date')}}">Reportes por fecha</a></li>

              </ul>
            </div>
          </li>
        </ul>
      </nav>
      @yield('preference')
      <!-- Pagina Principal -->
      {{-- @include('layouts._nav') --}}
      <div class="main-panel">
        @yield('content')
        <!-- main-panel ends -->
        <footer class="footer">
          <div class="col-lg-12 login-half-bg d-flex flex-row justify-content-center">
            {{-- <div class="d-sm-flex justify-content-center justify-content-sm-between"> --}}
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022.
              Todos los derechos reservados.&nbsp;</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><b><a style="text-decoration: none; color:rgb(17, 15, 129);" href="https://www.instagram.com/tribie17/">&nbsp;AF</a> </b> <i class="far fa-heart text-danger"></i>&nbsp;</span>
          </div>
        </footer>
      </div>
    </div>
  </div>

  {!! Html::script('melody/vendors/js/vendor.bundle.base.js') !!}
  {!! Html::script('melody/vendors/js/vendor.bundle.addons.js') !!}
  {!! Html::script('melody/js/off-canvas.js') !!}
  {!! Html::script('melody/js/hoverable-collapse.js') !!}
  {!! Html::script('melody/js/misc.js') !!}
  {!! Html::script('melody/js/settings.js') !!}
  {!! Html::script('melody/js/todolist.js') !!}
  {!! Html::script('melody/js/dashboard.js') !!}

  @yield('scripts')
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>  
<script>
  $(document).ready(function() {
    setTimeout(function() {
      $('#success-message').fadeOut('slow');
    }, 5000);
  });
</script>

</html>