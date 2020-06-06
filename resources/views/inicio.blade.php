@extends('layouts.logged')

@section('title')
    Inicio
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
    <!-- <li class="breadcrumb-item">Vacantes</li>
    <li class="breadcrumb-item active" aria-current="page">Listar Vacantes Abiertas</li> -->
@endsection
@section('logged-content')
<div class="row justify-content-around">
    <div class="col col-sm-6 col-lg-3 pb-5">
        <div class="card card-home">
            <div class="card-body">
                <div class="d-flex flex-column h-100"> 
                    <div class="d-flex mb-auto"> <h5 class="text-center card-title mx-auto">Abrir Vacante</h5> </div>
                    <div class="d-flex mt-auto mb-2"> <i class="fas fa-home icon-home mx-auto"></i>  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col col-sm-6 col-lg-3 pb-5">
        <div class="card card-home">
            <div class="card-body">
                <div class="d-flex flex-column h-100"> 
                    <div class="d-flex mb-auto"> <h5 class="text-center card-title mx-auto">Listar Vacantes Abiertas</h5> </div>
                    <div class="d-flex mt-auto mb-2"> <i class="fas fa-home icon-home mx-auto"></i>  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col col-sm-6 col-lg-3 pb-5">
        <div class="card card-home">
            <div class="card-body">
                <div class="d-flex flex-column h-100"> 
                    <div class="d-flex mb-auto"> <h5 class="text-center card-title mx-auto">Listar Vacantes</h5> </div>
                    <div class="d-flex mt-auto mb-2"> <i class="fas fa-home icon-home mx-auto"></i>  </div>
                </div>
          </div>
        </div>
    </div>
    <div class="col col-sm-6 col-lg-3 pb-5">
        <div class="card card-home">
            <div class="card-body">
                <div class="d-flex flex-column h-100"> 
                    <div class="d-flex mb-auto"> <h5 class="text-center card-title mx-auto">Mis Postulaciones</h5> </div>
                    <div class="d-flex mt-auto mb-2"> <i class="fas fa-home icon-home mx-auto"></i>  </div>
                </div>
          </div>
        </div>
    </div>
    <div class="col col-sm-6 col-lg-3 pb-5">
        <div class="card card-home">
            <div class="card-body">
                <div class="d-flex flex-column h-100"> 
                    <div class="d-flex mb-auto"> <h5 class="text-center card-title mx-auto">Crear Usuario</h5> </div>
                    <div class="d-flex mt-auto mb-2"> <i class="fas fa-home icon-home mx-auto"></i>  </div>
                </div>
          </div>
        </div>
    </div>
    <div class="col col-sm-6 col-lg-3 pb-5">
        <div class="card card-home">
            <div class="card-body">
                <div class="d-flex flex-column h-100"> 
                    <div class="d-flex mb-auto"> <h5 class="text-center card-title mx-auto">Listar Usuario</h5> </div>
                    <div class="d-flex mt-auto mb-2"> <i class="fas fa-home icon-home mx-auto"></i>  </div>
                </div>
          </div>
        </div>
    </div>
    <div class="col col-sm-6 col-lg-3 pb-5">
        <div class="card card-home">
            <div class="card-body">
                <div class="d-flex flex-column h-100"> 
                    <div class="d-flex mb-auto"> <h5 class="text-center card-title mx-auto">Consultar FAQs</h5> </div>
                    <div class="d-flex mt-auto mb-2"> <i class="fas fa-info-circle icon-home mx-auto"></i>  </div>
                </div>
          </div>
        </div>
    </div>
    <div class="col col-sm-6 col-lg-3 pb-5">
        <div class="card card-home">
            <div class="card-body">
                <div class="d-flex flex-column h-100"> 
                    <div class="d-flex mb-auto"> <h5 class="text-center card-title mx-auto">Solicitar Soporte</h5> </div>
                    <div class="d-flex mt-auto mb-2"> <i class="fas fa-question-circle icon-home mx-auto"></i>  </div>
                </div>
          </div>
        </div>
    </div>
</div>
@endsection
