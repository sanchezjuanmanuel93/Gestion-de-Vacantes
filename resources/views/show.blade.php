@extends('layouts.unlogged')

@section('title', "Gestión de Vacantes")

@section('unlogged-content')
<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$vacante->nombre_puesto}}</h6>
            </div>
            <div class="card-body">
                <div>
                    <span><b>Materia:</b> {{$vacante->materia->nombre}}</span>
                </div>
                <div>
                    <span><b>Fecha Apertura:</b> {{date('d/m/Y', strtotime($vacante->fecha_apertura))}}</span>
                </div>
                <div>
                    <span><b>Fecha Cierre Estipulada:</b> {{date('d/m/Y', strtotime($vacante->fecha_cierre_estipulada))}}</span>
                </div>
                <div>
                    <span><b>Fecha Cierre:</b> {{date('d/m/Y', strtotime($vacante->fecha_cierre))}}</span>
                </div>
                <div>
                    <span><b>Descripcion:</b></span>
                    <div>{{$vacante->descripcion_puesto}}</div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection