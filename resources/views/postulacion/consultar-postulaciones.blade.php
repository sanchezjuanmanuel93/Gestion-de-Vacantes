@extends('layouts.logged')

@section('title')
    Consultar Postulaciones
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{action('TableroController@index')}}">Inicio</a></li>
    <li class="breadcrumb-item">Postulaciones</li>
    <li class="breadcrumb-item active" aria-current="page"><a href="{{action('PostulacionController@consultaListaPostulaciones')}}">Mis Postulaciones</a></li> 
@endsection
@section('logged-content')
    Consultar postulaciones
@endsection
