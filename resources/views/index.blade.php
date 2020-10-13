@extends('layouts.unlogged')

@section('title', "Gestión de Vacantes")

@section('unlogged-content')
<div class="d-flex px-0 mx-0 w-100 pb-2 pb-md-4">
        <a href="{{route('login')}}" class="btn btn-primary ml-auto mr-0">Iniciar Sesión</a>
</div>
@if(count($vacantes) > 0)
<x-table tableId="dataTable">
        <x-slot name="header">
                <x-table-row>
                        <x-table-header>Materia</x-table-header>
                        <x-table-header>Nombre Puesto</x-table-header>
                        <x-table-header>Fecha Apertura</x-table-header>
                        <x-table-header>Fecha Cierre Estipulada</x-table-header>
                        <x-table-header></x-table-header>
                </x-table-row>
        </x-slot>
        @foreach ($vacantes as $vacante)
        <x-table-row>
                <x-table-cell>{{$vacante->materia->nombre}}</x-table-cell>
                <x-table-cell>{{$vacante->nombre_puesto}}</x-table-cell>
                <x-table-cell>{{\Carbon\Carbon::parse($vacante->fecha_apertura)->format('d-m-Y')}}</x-table-cell>
                <x-table-cell>{{\Carbon\Carbon::parse($vacante->fecha_cierre_estipulada)->format('d-m-Y')}}
                </x-table-cell>
                <x-table-cell>
                        <x-split-button displayName="Detalle" className="btn-success" iconName="fa-list"
                                routeName="{{route('inicio.show', $vacante->id)}}"></x-split-button>
                </x-table-cell>
        </x-table-row>
        @endforeach
</x-table>
@endif
No hay vacantes abiertas en este momento.
@endsection