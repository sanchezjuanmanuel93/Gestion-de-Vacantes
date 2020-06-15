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
<x-data-table title="Usuarios" :collection="$usuarios" :columns="['nombre', 'apellido', 'telefono', 'email', 'descripcion']"/>
@endsection
