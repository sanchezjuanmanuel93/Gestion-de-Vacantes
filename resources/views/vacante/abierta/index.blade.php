@extends('layouts.logged')

@section('title')
Consultar Vacantes Abiertas
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('inicio.index')}}">Inicio</a></li>
<li class="breadcrumb-item">Vacantes</li>
<li class="breadcrumb-item active" aria-current="page"><a href="{{route('vacante.abierta.index')}}">Consultar
        Vacantes Abiertas</a></li>
@endsection
@section('logged-content')
Consultar Vacantes Abiertas
@endsection