@extends('layouts.logged')
@section('title')
Consultar Usuarios
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('inicio.index')}}">Inicio</a></li>
<li class="breadcrumb-item">Usuarios</li>
<li class="breadcrumb-item active" aria-current="page"><a href="{{route('usuario.index')}}">Consultar Usuarios</a></li>
@endsection
@section('logged-content')
<x-table tableId="dataTable">
        <x-slot name="header">
                <x-table-row>
                        <x-table-header>Nombre</x-table-header>
                        <x-table-header>Apellido</x-table-header>
                        <x-table-header>Telefono</x-table-header>
                        <x-table-header>Email</x-table-header>
                        <x-table-header>Rol</x-table-header>
                        <x-table-header></x-table-header>
                        <x-table-header></x-table-header>
                </x-table-row>
        </x-slot>
        @foreach ($usuarios as $usuario)
        <x-table-row>
                <x-table-cell>{{$usuario->nombre}}</x-table-cell>
                <x-table-cell>{{$usuario->apellido}}</x-table-cell>
                <x-table-cell>{{$usuario->telefono}}</x-table-cell>
                <x-table-cell>{{$usuario->email}}</x-table-cell>
                <x-table-cell>{{$usuario->rolDescripcion}}</x-table-cell>
                <x-table-cell>
                        <x-split-button displayName="Detalle" className="btn-success" iconName="fa-list" routeName="{{route('usuario.show', $usuario->id)}}"></x-split-button>
                </x-table-cell>
                <x-table-cell>
                        @if(empty($usuario->deleted_at))
                        <x-form route="usuario.destroy" method="DELETE" :id="$usuario->id" hideButton="true">
                                <x-split-button buttonType="button" displayName="Baja" className="btn-danger" iconName="fa-ban"></x-split-button>
                        </x-form>
                        @endif
                        @if(!empty($usuario->deleted_at))
                        <x-form route="usuario.recuperar" method="PUT" :id="$usuario->id" hideButton="true">
                                <x-split-button buttonType="button" displayName="Recuperar" className="btn-info" iconName="fa-undo"></x-split-button>
                        </x-form>
                        @endif
                </x-table-cell>
        </x-table-row>
        @endforeach
</x-table>
@endsection