@extends('layouts.app')

@section('content')
  <div id="wrapper">
    @if (Route::currentRouteName() != 'tablero')
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('tablero')}}">
          <div class="sidebar-brand-icon">
            <i class="fas fa-user-graduate"></i>
          </div>
          <div class="sidebar-brand-text mx-3">Gestion de vacantes</div>
        </a>
        <hr class="sidebar-divider">
        <li class="nav-item {{Route::currentRouteName() == 'tablero' ? 'active' : ''}}">
          <a class="nav-link" href="{{route('tablero')}}">
            <i class="fas fa-fw fa-home"></i>
            <span>Inicio</span></a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Vacantes
        </div>
        <li class="nav-item {{Route::currentRouteName() == 'alta-vacante' ? 'active' : ''}}">
          <a class="nav-link" href="{{route('alta-vacante')}}">
            <i class="fas fa-fw fa-plus"></i>
            <span>Abrir Vacante</span></a>
        </li>
        <li class="nav-item {{Route::currentRouteName() == 'consultar-vacantes-abiertas' ? 'active' : ''}}">
        <a class="nav-link" href="{{route('consultar-vacantes-abiertas')}}">
            <i class="fas fa-fw fa-list-ul"></i>
            <span>Consultar Vacantes Abiertas</span></a>
        </li>
        <li class="nav-item {{Route::currentRouteName() == 'consultar-vacantes' ? 'active' : ''}}">
          <a class="nav-link" href="{{route('consultar-vacantes')}}">
            <i class="fas fa-fw fa-list-ul"></i>
            <span>Consultar Vacantes</span></a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Postulaciones
        </div>
        <li class="nav-item {{Route::currentRouteName() == 'consultar-postulaciones' ? 'active' : ''}}">
          <a class="nav-link" href="{{route('consultar-postulaciones')}}">
            <i class="fas fa-fw fa-list-ul"></i>
            <span>Mis Postulaciones</span></a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Usuarios
        </div>
        <li class="nav-item {{Route::currentRouteName() == 'alta-usuario' ? 'active' : ''}}">
          <a class="nav-link" href="{{route('alta-usuario')}}">
            <i class="fas fa-fw fa-plus"></i>
            <span>Crear Usuario</span></a>
        </li>
        <li class="nav-item {{Route::currentRouteName() == 'consultar-usuarios' ? 'active' : ''}}">
          <a class="nav-link" href="{{route('consultar-usuarios')}}">
            <i class="fas fa-fw fa-list-ul"></i>
            <span>Consultar Usuarios</span></a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Soporte
        </div>
        <li class="nav-item {{Route::currentRouteName() == 'consultar-faqs' ? 'active' : ''}}">
          <a class="nav-link" href="{{route('consultar-faqs')}}">
            <i class="fas fa-fw fa-info-circle"></i>
            <span>Consultar FAQs</span></a>
        </li>
        <li class="nav-item {{Route::currentRouteName() == 'solicitar-soporte' ? 'active' : ''}}">
          <a class="nav-link" href="{{route('solicitar-soporte')}}">
            <i class="fas fa-fw fa-question-circle"></i>
            <span>Solicitar Soporte</span></a>
        </li>
        </ul>
    @endif
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar static-top shadow">
          @if (Route::currentRouteName() != 'tablero')
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>
          @endif
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-md-inline small">{{Auth::user()->email}}</span>
                <i class="mr-2 fas d-inline d-md-none fa-user"></i>
                <i class="fas fa-angle-down"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{route('consultar-faqs')}}">
                  <i class="fas fa-info-circle fa-sm fa-fw mr-2 text-gray-400"></i>
                  FAQs
                </a>
                <a class="dropdown-item" href="{{route('solicitar-soporte')}}">
                  <i class="fas fa-question-circle fa-sm fa-fw mr-2 text-gray-400"></i>
                  Soporte
                </a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar Sesión
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <div class="container-fluid">
          @if (Route::currentRouteName() != 'tablero')
            <nav aria-label="breadcrumb" class="d-none d-md-block breadcrumb-nav">
                <ol class="breadcrumb">
                  @yield('breadcrumb')
                </ol>
            </nav>
            <div class="d-flex align-items-center">
              @if (url()->previous() != url()->current() && url()->previous() != route('login'))            
              <a href="{{ url()->previous() }}" class="mr-2 previous-button"><i class="fas fa-arrow-left"> </i> </a>
              @endif
              <h1 class="title-header"> @yield('title') </h1>
            </div>
          @endif
          <div class="container p-2 p-md-3">
            @yield('logged-content')
          </div>
        </div>
      </div>
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Universidad Tecnológica Nacional - 2020</span>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cerrar Sesión</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Confirme para cerrar sesión</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <form id="logout-form" action="{{ route('logout') }}" method="POST">
            {{ csrf_field() }}
            <button class="btn btn-primary" type="submit">Confirmar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

