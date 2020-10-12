@extends('layouts.logged')

@section('title')
Consultar Postulaciones
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('inicio.index')}}">Inicio</a></li>
<li class="breadcrumb-item active" aria-current="page"><a href="{{route('postulacion.index')}}">Mis
                Postulaciones</a></li>
@endsection
@section('logged-content')
<x-table tableId="dataTable">
        <x-slot name="header">
                <x-table-row>
                        <x-table-header>Materia</x-table-header>
                        <x-table-header>Nombre Puesto</x-table-header>
                        <x-table-header>Fecha Postulado</x-table-header>
                        <x-table-header>Fecha Apertura</x-table-header>
                        <x-table-header>Fecha Cierre</x-table-header>
                        <x-table-header></x-table-header>
                </x-table-row>
        </x-slot>
        @foreach ($postulaciones as $postulacion)
        <x-table-row>
                <x-table-cell>{{$postulacion->vacante->materia->nombre}}</x-table-cell>
                <x-table-cell>{{$postulacion->vacante->nombre_puesto}}</x-table-cell>
                <x-table-cell>{{\Carbon\Carbon::parse($postulacion->fecha_postulacion)->format('d-m-Y')}}
                </x-table-cell>
                <x-table-cell>{{\Carbon\Carbon::parse($postulacion->vacante->fecha_apertura)->format('d-m-Y')}}
                </x-table-cell>
                <x-table-cell>
                        {{\Carbon\Carbon::parse($postulacion->vacante->fecha_cierre ?: $postulacion->vacante->fecha_cierre_estipulada)->format('d-m-Y')}}
                </x-table-cell>
                <x-table-cell>
                        <x-split-button displayName="Detalle" className="btn-success" iconName="fa-list"
                                routeName="{{route('vacante.show', $postulacion->vacante->id)}}">
                        </x-split-button>
                </x-table-cell>
        </x-table-row>
        @endforeach
</x-table>
@endsection