@extends('layouts.logged')
@section('title')
Solicitar Soporte
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('inicio.index')}}">Inicio</a></li>
<li class="breadcrumb-item">Soporte</li>
<li class="breadcrumb-item active" aria-current="page"><a href="{{route('soporte.create')}}">Solicitar Soporte</a>
</li>
@endsection
@section('logged-content')
Aqui va el contenido!
@endsection