@extends('layouts.app')

@section('content')
<div class="container d-flex h-100">
    <div class="row h-100 w-100 justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verifique su email</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        Se envió un correo a su casilla con un link de validación actualizado.
                    </div>
                    @endif

                    Para continuar haga click en el link de validación que se le envió por correo.
                    Si no recibió el correo,
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit"
                            class="btn btn-link p-0 m-0 align-baseline">solicite el envío nuevamente</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection