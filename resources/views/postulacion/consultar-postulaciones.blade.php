@extends('layouts.logged')

@section('title')
Consultar Postulaciones
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('tablero')}}">Inicio</a></li>
<li class="breadcrumb-item">Postulaciones</li>
<li class="breadcrumb-item active" aria-current="page"><a href="{{route('consultar-postulaciones')}}">Mis
        Postulaciones</a></li>
@endsection
@section('logged-content')
Consultar postulaciones
@endsection