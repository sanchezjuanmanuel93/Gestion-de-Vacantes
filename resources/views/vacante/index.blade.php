@extends('layouts.logged')

@section('title')
Consultar Vacantes
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('inicio.index')}}">Inicio</a></li>
<li class="breadcrumb-item">Vacantes</li>
<li class="breadcrumb-item active" aria-current="page"><a href="{{route('vacante.index')}}">Consultar
                Vacantes</a></li>
@endsection
@section('logged-content')
<div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <tr>
                                <th>Materia</th>
                                <th>Nombre Puesto</th>
                                <th>Fecha Apertura</th>
                                <th>Fecha Cierre</th>
                                <th></th>
                        </tr>
                </thead>
                <tbody>
                        @foreach ($vacantes as $vacante)
                        <tr>
                                <th>{{$vacante->materia->nombre}}</th>
                                <th>{{$vacante->nombre_puesto}}</th>
                                <th>{{$vacante->fecha_apertura}}</th>
                                <th>{{$vacante->fecha_cierre}}</th>
                                <th>
                                        @foreach(Auth::user()->postulaciones as $postulacion)
                                        @if($postulacion->vacante->id == $vacante->id)
                                        <button class="btn btn-sm btn-outline-secondary" disabled>Postulado</button>
                                        @break
                                        @endif
                                        @if($loop->last)
                                        <form method="POST" action={{ route('postulacion.store') }}>
                                                @csrf
                                                <input name="id_vacante" type="hidden" value="$vacante->id">
                                                <x-upload-file fieldName="cv" />
                                                <button type="submit" class="btn btn-sm btn-light">Postular</button>
                                        </form>
                                        @endif
                                        @endforeach

                                </th>
                        </tr>
                        @endforeach
                </tbody>
        </table>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
        $('.file').change(function() {

        });
</script>
@endsection