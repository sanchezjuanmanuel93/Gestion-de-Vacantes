@extends('layouts.logged')

@section('title')
Consultar Vacantes
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('inicio.index')}}">Inicio</a></li>
<li class="breadcrumb-item active" aria-current="page"><a href="{{route('vacante.index')}}">Vacantes</a></li>
@endsection
@section('logged-content')
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