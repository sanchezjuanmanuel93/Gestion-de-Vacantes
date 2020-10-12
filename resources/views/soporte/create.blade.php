@extends('layouts.logged')
@section('title')
Solicitar Soporte
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('inicio.index')}}">Inicio</a></li>
<li class="breadcrumb-item active" aria-current="page"><a href="{{route('soporte.create')}}">Soporte</a>
</li>
@endsection
@section('logged-content')
<x-form method="POST" saveButtonText="Enviar" successMessage="Su consulta fue enviada con éxito" :success="$success ?? false" route="soporte.store">    
    <x-form-group-text-area fieldName="consulta" fieldId="consulta" fieldDescription="Consulta" :errors="$errors" />
</x-form>
@endsection