@extends('layouts.app')
@section('title')
Resetar Contraseña
@endsection
@section('content')
<div class="container d-flex h-100">
    <div class="row h-100 w-100 justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Confirmar Contraseña</div>

                <div class="card-body">
                    Confirme su contraseña para continuar.

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Confirmar Contraseña
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" title="¿Olvidó su contraseña? Link">
                                        ¿Olvidó su contraseña?
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
