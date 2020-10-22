@extends('layouts.logged')

@section('title')
Consultar Vacantes
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('inicio.index')}}">Inicio</a></li>
<li class="breadcrumb-item active" aria-current="page"><a href="{{route('vacante.index')}}">Vacantes</a></li>
@endsection
@section('logged-content')

<div class="row">
        <div class="col-md-6">
                <h2>Filtros:</h2>
                <div class="my-3 py-1">
                        <form>
                                <div class="form-inline">
                                        <x-form-group fieldName="fecha_apertura"
                                                fieldDescription="Fecha Apertura de Vacante: " :errors="$errors">
                                                <input type="radio" name="searchBy" value="fecha_apertura"
                                                        class="form-control" style="width: 1.25rem; height: 1.25rem;"
                                                        @if(request()->get('searchBy')
                                                == 'fecha_apertura') checked @endif>
                                        </x-form-group>
                                </div>
                                <div class="form-inline">
                                        <x-form-group fieldName="fecha_cierre_estipulada"
                                                fieldDescription="Fecha Cierre Estipulada: " :errors="$errors">
                                                <input type="radio" name="searchBy" value="fecha_cierre_estipulada"
                                                        class="form-control" style="width: 1.25rem; height: 1.25rem;"
                                                        @if(request()->get('searchBy') == 'fecha_cierre_estipulada')
                                                checked
                                                @endif>
                                        </x-form-group>
                                </div>
                                <div class="form-inline">
                                        <x-form-group fieldName="fecha_cierre" fieldDescription="Fecha Cierre: "
                                                :errors="$errors">
                                                <input type="radio" name="searchBy" value="fecha_cierre"
                                                        class="form-control" style="width: 1.25rem; height: 1.25rem;"
                                                        @if(request()->get('searchBy')
                                                == 'fecha_cierre') checked @endif>
                                        </x-form-group>
                                </div>
                                <div class="form-inline">
                                        <x-form-group fieldName="fecha_cierre_merito"
                                                fieldDescription="Fecha Realizacion de Orden de Merito: "
                                                :errors="$errors">
                                                <input type="radio" name="searchBy" value="fecha_cierre_merito"
                                                        class="form-control" style="width: 1.25rem; height: 1.25rem;"
                                                        @if(request()->get('searchBy') == 'fecha_cierre_merito') checked
                                                @endif>
                                        </x-form-group>
                                </div>

                                <div class="form-inline">
                                        <x-form-group-date-picker fieldName="fecha_inicio" fieldId="fecha_inicio"
                                                fieldDescription="Fecha Inicio:" :errors="$errors"
                                                :value="request()->get('fecha_inicio')" />
                                        <x-form-group-date-picker fieldName="fecha_fin" fieldId="fecha_fin"
                                                fieldDescription="Fecha Fin:" :errors="$errors"
                                                :value="request()->get('fecha_fin')" />
                                </div>
                                <input type="reset" value="Limpiar filtro" class="btn btn-success">

                                <input type="submit" value="Buscar" class="btn btn-primary">

                        </form>
                </div>
        </div>
</div>

@if(count($vacantes) > 0)
<x-table tableId="dataTable" :dataTable="true">
        <x-slot name="header">
                <x-table-row>
                        <x-table-header>Materia</x-table-header>
                        <x-table-header>Nombre Puesto</x-table-header>
                        <x-table-header>Estado</x-table-header>
                        <x-table-header>Fecha Apertura</x-table-header>
                        <x-table-header>Fecha Cierre Estipulada</x-table-header>
                        <x-table-header>Fecha Cierre</x-table-header>
                        <x-table-header>Fecha Orden Mérito</x-table-header>
                        <x-table-header>Postulantes</x-table-header>
                        <x-table-header></x-table-header>
                </x-table-row>
        </x-slot>
        @foreach ($vacantes as $vacante)
        <x-table-row>
                <x-table-cell>{{$vacante->materia->nombre}}</x-table-cell>
                <x-table-cell>{{$vacante->nombre_puesto}}</x-table-cell>
                <x-table-cell>{{$vacante->status}}</x-table-cell>
                <x-table-cell>{{\Carbon\Carbon::parse($vacante->fecha_apertura)->format('d-m-Y')}}</x-table-cell>
                <x-table-cell>{{\Carbon\Carbon::parse($vacante->fecha_cierre_estipulada)->format('d-m-Y')}}
                </x-table-cell>
                <x-table-cell>
                        @if(empty($vacante->fecha_cierre))
                        <x-form route="vacante.cerrarAnticipadamente" method="PUT" :id="$vacante->id" hideButton="true">
                                <x-split-button buttonType="button" displayName="Cerrar Ahora" className="btn-danger"
                                        iconName="fa-window-close"></x-split-button>
                        </x-form>
                        @else
                        {{\Carbon\Carbon::parse($vacante->fecha_cierre)->format('d-m-Y')}}
                        @endif
                </x-table-cell>
                <x-table-cell>
                        @if ($vacante->fecha_orden_merito)
                        {{\Carbon\Carbon::parse($vacante->fecha_orden_merito)->format('d-m-Y')}}
                        @endif
                </x-table-cell>
                <x-table-cell>
                        {{$vacante->postulaciones->count()}}
                </x-table-cell>
                <x-table-cell>
                        <x-split-button displayName="Detalle" className="btn-success" iconName="fa-list"
                                routeName="{{route('vacante.show', $vacante->id)}}"></x-split-button>
                </x-table-cell>
        </x-table-row>
        @endforeach
</x-table>
@else
No hay vacantes en este momento.
@endif
@endsection