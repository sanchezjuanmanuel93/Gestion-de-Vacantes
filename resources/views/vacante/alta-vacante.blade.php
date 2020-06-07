@extends('layouts.logged')

@section('title')
    Abrir Vacante
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('tablero')}}">Inicio</a></li>
    <li class="breadcrumb-item">Vacantes</li>
    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('alta-vacante')}}">Abrir Vacante</a></li> 
@endsection
@section('logged-content')
Aqui va el contenido!
@endsection
