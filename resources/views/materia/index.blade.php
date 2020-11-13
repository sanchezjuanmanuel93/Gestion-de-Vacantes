@extends('layouts.logged')

@section('title', "Materias")
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('inicio.index')}}" title="Inicio Link">Inicio</a></li>
<li class="breadcrumb-item active" aria-current="page"><a href="{{route('materia.index')}}"
                title="Materias Link">Materias</a></li>
@endsection
@section('logged-content')
<x-table tableId="dataTable">
        <x-slot name="header">
                <x-table-row>
                        <x-table-header>Nombre</x-table-header>
                        <x-table-header>Descripcion</x-table-header>
                        <x-table-header></x-table-header>
                        <x-table-header></x-table-header>
                </x-table-row>
        </x-slot>
        @foreach ($materias as $materia)
        <x-table-row>
                <x-table-cell>{{$materia->nombre}}</x-table-cell>
                <x-table-cell>{{$materia->descripcion}}</x-table-cell>
                <x-table-cell>
                        <x-split-button displayName="Detalle" className="btn-success" iconName="fa-list"
                                routeName="{{route('materia.show', $materia->id)}}"></x-split-button>

                </x-table-cell>
                <x-table-cell>
                        <x-form route="materia.destroy" method="DELETE" :id="$materia->id" hideButton="true">
                                <x-split-button buttonType="button" displayName="Baja" className="btn-danger"
                                        iconName="fa-ban"></x-split-button>
                        </x-form>
                </x-table-cell>
        </x-table-row>
        @endforeach
</x-table>
@endsection