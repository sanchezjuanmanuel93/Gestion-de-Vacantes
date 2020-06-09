@extends('layouts.logged')

@section("title", "Abrir Vacante")

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('tablero')}}">Inicio</a></li>
<li class="breadcrumb-item">Vacantes</li>
<li class="breadcrumb-item active" aria-current="page"><a href="{{route('vacante.create')}}">Abrir Vacante</a></li>
@endsection

@section('logged-content')
<div class="row-fluid">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Abrir Vacante</strong>
            </div>
                <div class="card-body">
                <form action="{{route("vacante.store")}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="id-materia" class="control-label mb-1">Materia</label>
                            <select name="id-materia" id="id-materia" class="form-control">
                                @foreach ($materias as $materia)
                                    <option value="{{$materia->id}}">{{$materia->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fecha-apertura" class="control-label mb-1">Fecha Apertura</label>
                            <input id="fecha-apertura" name="fecha-apertura" type="text" class="form-control" data-val="true" autocomplete="fecha-apertura" aria-required="true" aria-invalid="false">
                        </div>
                        <div class="form-group">
                            <label for="fecha-cierre" class="control-label mb-1">Fecha Cierre</label>
                            <input id="fecha-cierre" name="fecha-cierre" type="text" class="form-control" data-val="true" autocomplete="fecha-cierre" aria-required="true" aria-invalid="false">
                        </div>
                        <div class="form-group">
                            <label for="nombre-puesto" class="control-label mb-1">Nombre del Puesto</label>
                            <input id="nombre-puesto" name="nombre-puesto" type="text" class="form-control" data-val="true" autocomplete="nombre-puesto" aria-required="true" aria-invalid="false">
                        </div>
                        <div class="form-group">
                            <label for="descripcion-puesto" class="control-label mb-1">Descripcion del Puesto</label>
                            <textarea id="descripcion-puesto" name="descripcion-puesto" type="text" class="form-control" data-val="true" autocomplete="descripcion-puesto" aria-required="true" aria-invalid="false"></textarea>
                        </div>                        
                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                <i class="fa fa-save fa-lg"></i>&nbsp;
                                <span>Guardar</span>
                            </button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection