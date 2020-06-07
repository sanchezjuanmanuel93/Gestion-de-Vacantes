@extends('layouts.logged')
@section('title')
    Consultar Usuarios
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('tablero')}}">Inicio</a></li>
    <li class="breadcrumb-item">Usuarios</li>
    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('consultar-usuarios')}}">Consultar Usuarios</a></li> 
@endsection
@section('logged-content')
    Aqui va el contenido!
@endsection
