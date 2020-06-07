@extends('layouts.logged')
@section('title')
    Consultar FAQs
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('tablero')}}">Inicio</a></li>
    <li class="breadcrumb-item">Soporte</li>
    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('consultar-faqs')}}">Consultar FAQs</a></li> 
@endsection
@section('logged-content')
    Aqui va el contenido!
@endsection
