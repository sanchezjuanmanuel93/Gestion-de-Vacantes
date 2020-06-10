@extends('layouts.logged')
@section('title')
Cambiar Contraseña
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('inicio.index')}}">Inicio</a></li>
<li class="breadcrumb-item active" aria-current="page"><a href="{{route('contraseña.index')}}">Cambiar Contraseña</a></li>
@endsection

@section('logged-content')
<x-form method="POST" successMessage="Su contraseña fue cambiada con éxito" :success="$success ?? false" route="contraseña.store">
    <x-form-group-password fieldId="contrasenaActual" fieldName="contrasenaActual" fieldDescription="Contraseña Actual" :errors="$errors" />
    <x-form-group-password fieldId="contrasenaNueva" fieldName="contrasenaNueva" fieldDescription="Contraseña Nueva" :errors="$errors" />
    <x-form-group-password fieldId="contrasenaNuevaConfirmar" fieldName="contrasenaNuevaConfirmar" fieldDescription="Confirmar Contraseña Nueva" :errors="$errors" />
</x-form>
@endsection