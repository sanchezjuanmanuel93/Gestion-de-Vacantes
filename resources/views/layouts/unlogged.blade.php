@extends('layouts.app')
@section('content')
<div id="wrapper">
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <h1 class="title-header"> @yield('title') </h1>
        </div>
        <div class="p-2 py-md-4 mb-3 mb-md-5 mt-5 bg-white mx-3 mx-md-5">
          @yield('unlogged-content')
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
<a class="scroll-to-top rounded" href="#page-top" title="Ir Arriba Link">
  <i class="fas fa-angle-up" title="Ir Arriba Icon"></i>
</a>
@endsection