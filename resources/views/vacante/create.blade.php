@extends('layouts.logged')

@section("title", "Abrir Vacante")

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('tablero')}}">Inicio</a></li>
<li class="breadcrumb-item">Vacantes</li>
<li class="breadcrumb-item active" aria-current="page"><a href="{{route('vacante.create')}}">Abrir Vacante</a></li>
@endsection

@section('logged-content')
<x-form method="POST" :success="$success ?? false" route="vacante.store">
    <x-form-group-select fieldName="id-materia" fieldId="id-materia" fieldDescription="Materia" :errors="$errors" :collection="$materias" keyField="id" valueField="nombre" searchOn="true" placeholder="Ingrese materia a buscar"/>
    <x-form-group-date-picker fieldName="fecha-apertura" fieldId="fecha-apertura" fieldDescription="Fecha Apertura" :errors="$errors" />
    <x-form-group-date-picker fieldName="fecha-cierre" fieldId="fecha-cierre" fieldDescription="Fecha Cierre" :errors="$errors" />
    <x-form-group-text fieldName="nombre-puesto" fieldId="nombre-puesto" fieldDescription="Nombre del Puesto" :errors="$errors" />
    <x-form-group-text-area fieldName="descripcion-puesto" fieldId="descripcion-puesto" fieldDescription="Descripcion del Puesto" :errors="$errors" />
</x-form>
@endsection