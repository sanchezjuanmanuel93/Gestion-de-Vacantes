@extends('layouts.logged')
@section('title')
    Consultar Usuarios
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('inicio.index')}}">Inicio</a></li>
    <li class="breadcrumb-item">Usuarios</li>
    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('usuario.index')}}">Consultar Usuarios</a></li> 
@endsection
@section('logged-content')
<div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Rol</th>
                        </tr>
                </thead>
                <tbody>
                        @foreach ($usuarios as $usuario)
                        <tr>
                                <th>{{$usuario->nombre}}</th>
                                <th>{{$usuario->apellido}}</th>
                                <th>{{$usuario->telefono}}</th>
                                <th>{{$usuario->email}}</th>
                                <th>{{$usuario->rolDescripcion}}</th>
                        </tr>
                        @endforeach
                </tbody>
        </table>
</div>
@endsection
