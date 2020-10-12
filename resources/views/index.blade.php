@extends('layouts.app')

@section('title', "Inicio")

@section('content')

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
@if(Auth::user() == null)
<div class="container">
        <a href="/login" class="btn btn-primary center-block">Iniciar Sesión</a>
</div>
@endif
@endsection