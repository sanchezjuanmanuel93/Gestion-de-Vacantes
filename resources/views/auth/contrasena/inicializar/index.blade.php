@extends('layouts.logged')
@section('title')
Inicializar Contraseña
@endsection
@section('breadcrumb')
<li class="breadcrumb-item" title="Inicio Link">Inicio</li>
<li class="breadcrumb-item active" aria-current="page"><a href="{{route('contraseña.inicializar.index')}}" title="Inicializar Contraseña Link">Inicializar Contraseña</a></li>
@endsection

@section('logged-content')
<x-form method="POST" route="contraseña.inicializar.store" message="Debe actualizar la contraseña para poder navegar en la web">
    <x-form-group-password fieldId="contrasenaNueva" fieldName="contrasenaNueva" fieldDescription="Contraseña Nueva" :errors="$errors" />
    <x-form-group-password fieldId="contrasenaNuevaConfirmar" fieldName="contrasenaNuevaConfirmar" fieldDescription="Confirmar Contraseña Nueva" :errors="$errors" />
</x-form>
@endsection