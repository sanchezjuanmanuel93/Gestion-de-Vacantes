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
                </x-table-row>
        </x-slot>
        @foreach ($usuarios as $usuario)
        <x-table-row>
                <x-table-cell>{{$usuario->nombre}}</x-table-cell>
                <x-table-cell>{{$usuario->apellido}}</x-table-cell>
                <x-table-cell>{{$usuario->telefono}}</x-table-cell>
                <x-table-cell>{{$usuario->email}}</x-table-cell>
                <x-table-cell>{{$usuario->rolDescripcion}}</x-table-cell>
        </x-table-row>
        @endforeach
</x-table>
@endsection