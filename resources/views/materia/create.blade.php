@extends('layouts.logged')

@section("title", "Materias")

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('inicio.index')}}" title="Inicio Link">Inicio</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{route('materia.index')}}" title="Vacantes Link">Materias</a>
</li>
<li class="breadcrumb-item active" aria-current="page"><a href="{{route('materia.create')}}"
        title="Crear Materia Link">Crear Materia</a></li>
@endsection

@section('logged-content')
<x-form method="POST" :success="$success ?? false" route="materia.store">
    <x-form-group-text :value="$materia->nombre ?? ''" fieldName="nombre" fieldId="nombre"
        fieldDescription="Nombre de la Materia" :errors="$errors" />
    <x-form-group-text-area :value="$materia->descripcion ?? ''" fieldName="descripcion" fieldId="descripcion"
        fieldDescription="Descripcion de la Materia" :errors="$errors" />
</x-form>
@endsection