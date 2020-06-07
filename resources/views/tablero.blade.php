@extends('layouts.logged')

@section('title')
    Inicio
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{action('TableroController@index')}}">Inicio</a></li>
    <!-- <li class="breadcrumb-item">Vacantes</li>
    <li class="breadcrumb-item active" aria-current="page">Listar Vacantes Abiertas</li> -->
@endsection
@section('logged-content')
<div class="row justify-content-around">
    <div class="col-12 col-md-6 col-lg-3 pb-5">
        <a href="{{action('AbrirVacanteController@index')}}" class="icon-home-anchor">
            <div class="card card-home mx-auto">
                <div class="card-body">
                    <div class="d-flex flex-column h-100"> 
                        <div class="d-flex mb-auto"> <h5 class="text-center card-title mx-auto">Abrir Vacante</h5> </div>
                        <div class="d-flex mt-auto mb-2"> <i class="fas fa-plus icon-home mx-auto"></i>  </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-6 col-lg-3 pb-5">
        <a href="#" class="icon-home-anchor">
            <div class="card card-home mx-auto">
                <div class="card-body">
                    <div class="d-flex flex-column h-100"> 
                        <div class="d-flex mb-auto"> <h5 class="text-center card-title mx-auto">Listar Vacantes Abiertas</h5> </div>
                        <div class="d-flex mt-auto mb-2"> <i class="fas fa-list-ul icon-home mx-auto"></i>  </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-6 col-lg-3 pb-5">
        <a href="#" class="icon-home-anchor">
            <div class="card card-home mx-auto">
                <div class="card-body">
                    <div class="d-flex flex-column h-100"> 
                        <div class="d-flex mb-auto"> <h5 class="text-center card-title mx-auto">Listar Vacantes</h5> </div>
                        <div class="d-flex mt-auto mb-2"> <i class="fas fa-list-ul icon-home mx-auto"></i>  </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-6 col-lg-3 pb-5">
        <a href="#" class="icon-home-anchor">
            <div class="card card-home mx-auto">
                <div class="card-body">
                    <div class="d-flex flex-column h-100"> 
                        <div class="d-flex mb-auto"> <h5 class="text-center card-title mx-auto">Mis Postulaciones</h5> </div>
                        <div class="d-flex mt-auto mb-2"> <i class="fas fa-list-ul icon-home mx-auto"></i>  </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-6 col-lg-3 pb-5">
        <a href="#" class="icon-home-anchor">
            <div class="card card-home mx-auto">
                <div class="card-body">
                    <div class="d-flex flex-column h-100"> 
                        <div class="d-flex mb-auto"> <h5 class="text-center card-title mx-auto">Crear Usuario</h5> </div>
                        <div class="d-flex mt-auto mb-2"> <i class="fas fa-plus icon-home mx-auto"></i>  </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-6 col-lg-3 pb-5">
        <a href="#" class="icon-home-anchor">
            <div class="card card-home mx-auto">
                <div class="card-body">
                    <div class="d-flex flex-column h-100"> 
                        <div class="d-flex mb-auto"> <h5 class="text-center card-title mx-auto">Listar Usuario</h5> </div>
                        <div class="d-flex mt-auto mb-2"> <i class="fas fa-list-ul icon-home mx-auto"></i>  </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-6 col-lg-3 pb-5">
        <a href="#" class="icon-home-anchor">
            <div class="card card-home mx-auto">
                <div class="card-body">
                    <div class="d-flex flex-column h-100"> 
                        <div class="d-flex mb-auto"> <h5 class="text-center card-title mx-auto">Consultar FAQs</h5> </div>
                        <div class="d-flex mt-auto mb-2"> <i class="fas fa-info-circle icon-home mx-auto"></i>  </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-6 col-lg-3 pb-5">
        <a href="#" class="icon-home-anchor">
            <div class="card card-home mx-auto">
                <div class="card-body">
                    <div class="d-flex flex-column h-100"> 
                        <div class="d-flex mb-auto"> <h5 class="text-center card-title mx-auto">Solicitar Soporte</h5> </div>
                        <div class="d-flex mt-auto mb-2"> <i class="fas fa-question-circle icon-home mx-auto"></i>  </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
