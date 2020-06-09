@extends('layouts.logged')
@section('title')
Cambiar Contraseña
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('tablero')}}">Inicio</a></li>
<li class="breadcrumb-item active" aria-current="page"><a href="{{route('cambiar-contrasena-index')}}">Cambiar Contraseña</a></li>
@endsection

@section('logged-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('cambiar-contrasena') }}">
                @csrf

                @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
                @endforeach

                @if (isset($success))
                <p class="text-success"> Su contraseña fue cambiada con éxito</p>
                @endif

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña Actual</label>
                    <div class="col-md-6">
                        <input id="contrasenaActual" type="password" class="form-control" name="contrasenaActual" autocomplete="contrasenaActual">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña Nueva</label>
                    <div class="col-md-6">
                        <input id="contrasenaNueva" type="password" class="form-control" name="contrasenaNueva" autocomplete="contrasenaActual">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Confirmar Contraseña Nueva</label>
                    <div class="col-md-6">
                        <input id="contrasenaNuevaConfirmar" type="password" class="form-control" name="contrasenaNuevaConfirmar" autocomplete="contrasenaActual">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Guardar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection