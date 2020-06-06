@extends('layouts.app')

@section('content')
  <div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <i class="fas fa-user-graduate"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Gestion de vacantes</div>
      </a>
      <hr class="sidebar-divider">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-home"></i>
          <span>Inicio</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Vacantes
      </div>
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-plus"></i>
          <span>Abrir Vacante</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-list-ul"></i>
          <span>Listar Vacantes Abiertas</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-list-ul"></i>
          <span>Listar Vacantes</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Postulaciones
      </div>
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-list-ul"></i>
          <span>Mis Postulaciones</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Usuarios
      </div>
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-plus"></i>
          <span>Crear Usuario</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-list-ul"></i>
          <span>Listar Usuario</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Soporte
      </div>
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-info-circle"></i>
          <span>Consultar FAQs</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-question-circle"></i>
          <span>Solicitar Soporte</span></a>
      </li>
    </ul>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-md-inline small">gestion.de.vacantes.2020@gmail.com</span>
                <i class="mr-2 fas d-inline d-md-none fa-user"></i>
                <i class="fas fa-angle-down"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-info-circle fa-sm fa-fw mr-2 text-gray-400"></i>
                  FAQs
                </a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
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
          <nav aria-label="breadcrumb" class="d-none d-md-block">
            <ol class="breadcrumb">
              @yield('breadcrumb')
            </ol>
          </nav>
          <h1> @yield('title') </h1>
          <div class="container p-2 p-md-5">
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
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>
@endsection

