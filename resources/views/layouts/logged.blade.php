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
        <x-NavItem displayName="Abrir Vacante" routeName="alta-vacante" iconName="fa-plus" />
        <x-NavItem displayName="Consultar Vacantes Abiertas" routeName="consultar-vacantes-abiertas" iconName="fa-list-ul" />
        <x-NavItem displayName="Consultar Vacantes" routeName="consultar-vacantes" iconName="fa-list-ul" />
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Postulaciones
        </div>
        <x-NavItem displayName="Mis Postulaciones" routeName="consultar-postulaciones" iconName="fa-list-ul" />
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Usuarios
        </div>
        <x-NavItem displayName="Crear Usuario" routeName="alta-usuario" iconName="fa-plus" />
        <x-NavItem displayName="Consultar Usuarios" routeName="consultar-usuarios" iconName="fa-list-ul" />
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Soporte
        </div>
        <x-NavItem displayName="Consultar FAQs" routeName="consultar-faqs" iconName="fa-info-circle" />
        <x-NavItem displayName="Solicitar Soporte" routeName="solicitar-soporte" iconName="fa-question-circle" />
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

