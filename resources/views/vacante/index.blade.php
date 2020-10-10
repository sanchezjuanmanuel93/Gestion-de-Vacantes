@extends('layouts.logged')

@section('title')
Consultar Vacantes
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('inicio.index')}}">Inicio</a></li>
<li class="breadcrumb-item">Vacantes</li>
<li class="breadcrumb-item active" aria-current="page"><a href="{{route('vacante.index')}}">Consultar
                Vacantes</a></li>
@endsection
@section('logged-content')
<x-table tableId="dataTable">
        <x-slot name="header">
                <x-table-row>
                        <x-table-header>Materia</x-table-header>
                        <x-table-header>Nombre Puesto</x-table-header>
                        <x-table-header>Fecha Apertura</x-table-header>
                        <x-table-header>Fecha Cierre</x-table-header>
                        <x-table-header></x-table-header>
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
                                routeName="{{route('vacante.show', $vacante->id)}}"></x-split-button>
                </x-table-cell>
                <x-table-cell>
                        @foreach(Auth::user()->postulaciones as $postulacion)
                        @if($postulacion->vacante->id == $vacante->id)
                        <button class="btn btn-sm btn-outline-secondary" disabled>Postulado</button>
                        @break
                        @endif
                        @if($loop->last)
                        <form method="POST" action={{ route('postulacion.store') }} enctype="multipart/form-data">
                                @csrf
                                <input name="id_vacante" type="hidden" value="{{$vacante->id}}">
                                <x-upload-file fieldName="cv" :errors="$errors" />
                                <button type="submit" class="btn btn-sm btn-light">Postular</button>
                        </form>
                        @endif
                        @endforeach
                </x-table-cell>
        </x-table-row>
        @endforeach
</x-table>
@endsection