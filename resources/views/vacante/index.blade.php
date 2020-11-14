@extends('layouts.logged')

@section('styles')
<style>
        input[type=checkbox] {
                width: 25px;
                height: 25px;
                margin-right: 15px;
        }
</style>
@endsection

@section('title')
Consultar Vacantes
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('inicio.index')}}" title="Inicio Link">Inicio</a></li>
<li class="breadcrumb-item active" aria-current="page"><a href="{{route('vacante.index')}}" title="Vacantes Link">Vacantes</a></li>
@endsection
@section('logged-content')

<div class="container-fluid mb-5">
        <form action="" id="form-filter">
                <div class="row mb-3">
                        <div class="col-lg-6 col-12">
                                <x-form-group-select-materia :selected="$id_materia" />
                        </div>
                        <div class="col-lg-6 col-12">
                                <div class="form-inline">
                                        <x-form-group fieldName="" fieldDescription=""
                                                :errors="$errors">
                                                <x-form-group fieldName="creada" fieldDescription="Creada"
                                                        :errors="$errors">
                                                        <input type="checkbox" name="estados[]" value="creada"
                                                                @if($estadoCreada) checked @endif >
                                                </x-form-group>
                                                <x-form-group fieldName="abierta" fieldDescription="Abierta"
                                                        :errors="$errors">
                                                        <input type="checkbox" name="estados[]" value="abierta"
                                                                @if($estadoAbierta) checked @endif >
                                                </x-form-group>
                                                <x-form-group fieldName="cerrada" fieldDescription="Cerrada"
                                                        :errors="$errors">
                                                        <input type="checkbox" name="estados[]" value="cerrada"
                                                        @if($estadoCerrada) checked @endif >
                                                </x-form-group>
                                                <x-form-group fieldName="finalizada"
                                                        fieldDescription="Finalizada" :errors="$errors">
                                                        <input type="checkbox" name="estados[]"
                                                                value="finalizada"
                                                                @if($estadoFinalizada) checked @endif >
                                                </x-form-group>
                                        </x-form-group>
                                </div>
                        </div>
                </div>
                <div class="row mb-3">
                        <div class="col-lg-6 col-12">
                                <div class="row">
                                        <div class="form-inline">
                                                <div class="col-lg-2">
                                                        <label class="float-left">Apertura:</label>
                                                </div>
                                                <div class="col-lg-5">
                                                        <x-form-group-date-picker fieldName="apertura_fecha_inicio"
                                                                fieldId="apertura_fecha_inicio" fieldDescription=""
                                                                :errors="$errors"
                                                                :value="$apertura_fecha_inicio" />
                                                </div>
                                                <div class="col-lg-5">
                                                        <x-form-group-date-picker fieldName="apertura_fecha_fin"
                                                                fieldId="apertura_fecha_fin" fieldDescription=""
                                                                :errors="$errors"
                                                                :value="$apertura_fecha_fin" />
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <div class="col-lg-6 col-12">
                                <div class="row">
                                        <div class="form-inline">
                                                <div class="col-lg-2">
                                                        <label class="float-left">Orden de Merito:</label>
                                                </div>
                                                <div class="col-lg-5">
                                                        <x-form-group-date-picker fieldName="orden_merito_inicio"
                                                                fieldId="orden_merito_inicio" fieldDescription=""
                                                                :errors="$errors"
                                                                :value="$orden_merito_inicio"  />
                                                </div>
                                                <div class="col-lg-5">
                                                        <x-form-group-date-picker fieldName="orden_merito_fin"
                                                                fieldId="orden_merito_fin" fieldDescription=""
                                                                :errors="$errors"
                                                                :value="$orden_merito_fin" />
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                
                <div class="row mb-3">
                        <div class="col-lg-6 col-12">
                                <div class="row">
                                        <div class="form-inline">
                                                <div class="col-lg-2">
                                                        <label class="float-left">Cierre:</label>
                                                </div>
                                                <div class="col-lg-5">
                                                        <x-form-group-date-picker fieldName="cierre_fecha_inicio"
                                                                fieldId="cierre_fecha_inicio" fieldDescription=""
                                                                :errors="$errors"
                                                                :value="$cierre_fecha_inicio" />
                                                </div>
                                                <div class="col-lg-5">
                                                        <x-form-group-date-picker fieldName="cierre_fecha_fin"
                                                                fieldId="cierre_fecha_fin" fieldDescription=""
                                                                :errors="$errors"
                                                                :value="$cierre_fecha_fin" />
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <div class="col-lg-6 col-12">
                                <button class="btn btn-primary float-right ml-1" type="submit">Filtrar</button>
                                        <a class="btn btn-success float-right" id="btn-reset" href="
                                {{route('vacante.index')}}">Borrar
                                                filtros</a>
                        </div>
                </div>

        </form>
        <hr>

        @if(count($vacantes) > 0)
        <x-table tableId="dataTable">
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
                        <x-table-cell>{{\Carbon\Carbon::parse($vacante->fecha_apertura)->format('d-m-Y')}}
                        </x-table-cell>
                        <x-table-cell>{{\Carbon\Carbon::parse($vacante->fecha_cierre_estipulada)->format('d-m-Y')}}
                        </x-table-cell>
                        <x-table-cell>
                                @if(empty($vacante->fecha_cierre))
                                        @if(Auth::user()->rol->id == App\Rol::$RESPONSABLE_ADMINISTRATIVO)
                                        <x-form route="vacante.cerrarAnticipadamente" method="PUT" :id="$vacante->id"
                                                hideButton="true">
                                                <x-split-button buttonType="button" displayName="Cerrar Ahora"
                                                        className="btn-danger" iconName="fa-window-close"></x-split-button>
                                        </x-form>
                                        @endif
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
        {{ $vacantes->links() }}
        @else
        No hay vacantes en este momento.
        @endif
</div>
@endsection