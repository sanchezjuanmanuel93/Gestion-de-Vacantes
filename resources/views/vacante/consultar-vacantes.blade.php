@extends('layouts.logged')

@section('title')
Consultar Vacantes
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('tablero')}}">Inicio</a></li>
<li class="breadcrumb-item">Vacantes</li>
<li class="breadcrumb-item active" aria-current="page"><a href="{{route('consultar-vacantes-abiertas')}}">Consultar
        Vacantes</a></li>
@endsection
@section('logged-content')
Consultar Vacantes
@endsection