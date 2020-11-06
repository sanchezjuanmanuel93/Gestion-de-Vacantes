@extends('layouts.logged')
@section('title')
Crear Usuario
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('inicio.index')}}" title="Inicio Link">Inicio</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{route('usuario.index')}}" title="Usuarios Link">Usuarios</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('usuario.create')}}" title="Crear Usuario Link">Crear Usuario</a></li> 
@endsection
@section('logged-content')
<x-form method="POST" :success="$success ?? false" route="usuario.store">
    <x-form-group-text fieldName="nombre" fieldId="nombre" fieldDescription="Nombre" :errors="$errors" />
    <x-form-group-text fieldName="apellido" fieldId="apellido" fieldDescription="Apellido" :errors="$errors" />
    <x-form-group-email fieldName="email" fieldId="email" fieldDescription="Email" :errors="$errors" />
    <x-form-group-text fieldName="telefono" fieldId="telefono" fieldDescription="Telefono" :errors="$errors" />
    <x-form-group-select fieldName="rol" fieldId="rol" fieldDescription="Rol" :errors="$errors" :collection="$roles" keyField="id" valueField="descripcion" searchOn="true" placeholder="Ingrese el rol del usuario"/>
</x-form>
@endsection
