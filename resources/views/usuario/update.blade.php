@extends('layouts.logged')
@section('title')
Editar Usuario
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('inicio.index')}}" title="Inicio Link">Inicio</a></li>    
    <li class="breadcrumb-item" aria-current="page"><a href="{{route('usuario.index')}}" title="Usuarios Link">Usuarios</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('usuario.show', $id)}}" title="Detalle Link">{{$nombre}} {{$apellido}}</a></li> 
@endsection
@section('logged-content')
<x-form method="PUT" :success="$success ?? false" route="usuario.update" :id="$id">
    <x-form-group-text fieldName="nombre" fieldId="nombre" fieldDescription="Nombre" :errors="$errors" :value="$nombre"/>
    <x-form-group-text fieldName="apellido" fieldId="apellido" fieldDescription="Apellido" :errors="$errors" :value="$apellido"/>
    <x-form-group-text fieldName="telefono" fieldId="telefono" fieldDescription="Telefono" :errors="$errors" :value="$telefono"/>
    <x-form-group-select fieldName="id_rol" fieldId="id_rol" fieldDescription="Rol" :errors="$errors" :collection="$roles" keyField="id" valueField="descripcion" searchOn="true" placeholder="Ingrese el rol del usuario" :selected="$id_rol"/>
</x-form>
@endsection
