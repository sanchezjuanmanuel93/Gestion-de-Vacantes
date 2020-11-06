@extends('layouts.logged')

@section('title', "Detalle vacante")

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('inicio.index')}}" title="Inicio Link">Inicio</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{route('vacante.index')}}" title="Vacantes Link">Vacantes</a></li>
<li class="breadcrumb-item active" aria-current="page"><a
        href="{{route('vacante.show', $vacante->id)}}" title="Detalle Link">{{$vacante->nombre_puesto}} ({{$vacante->materia->nombre}})</a></li>
@endsection
@section('logged-content')

<div class="row">
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{$vacante->nombre_puesto}}</h6>
            </div>
            <div class="card-body">
                <div>
                    <span><b>Materia:</b> {{$vacante->materia->nombre}}</span>
                </div>
                <div>
                    <span><b>Fecha Apertura:</b> {{date('d/m/Y', strtotime($vacante->fecha_apertura))}}</span>
                </div>
                <div>
                    <span><b>Fecha Cierre Estipulada:</b>
                        {{date('d/m/Y', strtotime($vacante->fecha_cierre ?: $vacante->fecha_cierre_estipulada))}}</span>
                </div>
                <div>
                    <span><b>Descripcion:</b></span>
                    <div>{{$vacante->descripcion_puesto}}</div>
                </div>
                @if(Auth::user()->id_rol == App\Rol::$POSTULANTE)
                @foreach(Auth::user()->postulaciones as $postulacion)
                @if($postulacion->vacante->id == $vacante->id)
                <button class="btn btn-sm btn-outline-secondary float-right"
                    disabled>Postulado[{{date('d/m/Y', strtotime($postulacion->fecha_postulacion))}}]</button>
                @break
                @endif
                @if($loop->last)
                <form method="POST" action={{ route('postulacion.store') }} enctype="multipart/form-data">
                    @csrf
                    <div class="float-right">
                        <input name="id_vacante" type="hidden" value="{{$vacante->id}}">
                        <x-upload-file fieldName="cv" :errors="$errors" />
                        <button type="submit" class="btn btn-sm btn-light">Postular</button>
                    </div>
                </form>
                @endif
                @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-6">

        @if(Auth::user() != null && Auth::user()->rol->id == App\Rol::$POSTULANTE)
        <x-card color="success" displayName="Estado" :displayDescription="$state" iconName="fa-list" />
        @endif

        @if(Auth::user() != null && Auth::user()->rol->id == App\Rol::$RESPONSABLE_ADMINISTRATIVO)
        <div class="row">
            <x-card color="warning" displayName="Postulados" :displayDescription="count($vacante->postulaciones)"
                iconName="fa-users" />
            <x-card color="success" displayName="Estado" :displayDescription="$state" iconName="fa-list" />
        </div>
        <div class="row">
            <div class="col-lg-12">

            <form class="form-inline" method="POST" action="{{route('vacante.orden')}}"
                onsubmit="return validatePuntajes()">
                <input type="hidden" name="id_vacante" value="{{$vacante->id}}" />
                <x-table tableId="dataTable">
                    <x-slot name="header">
                        <x-table-row>
                            <x-table-header>Nombre</x-table-header>
                            <x-table-header>Apellido</x-table-header>
                            <x-table-header>Telefono</x-table-header>
                            <x-table-header>Email</x-table-header>
                            <x-table-header>CV</x-table-header>
                            @if($vacante->status() == App\Vacante::$CERRADA || $vacante->status() ==
                            App\Vacante::$FINALIZADA)
                            <x-table-header>Puntaje</x-table-header>
                            @endif
                        </x-table-row>
                    </x-slot>
                    @foreach ($vacante->postulaciones as $postulacion)
                    <x-table-row>
                        <x-table-cell>{{$postulacion->usuario->nombre}}</x-table-cell>
                        <x-table-cell>{{$postulacion->usuario->apellido}}</x-table-cell>
                        <x-table-cell>{{$postulacion->usuario->telefono}}</x-table-cell>
                        <x-table-cell>{{$postulacion->usuario->email}}</x-table-cell>
                        <x-table-cell><a href="{{route('postulacion.descargarCV', $postulacion->id)}}"
                                class="btn btn-primary btn-sm" title="Descargar Link"><i class="fa fa-download" title="Descargar Icon"></i></a>
                        </x-table-cell>
                        @if($vacante->status() == App\Vacante::$CERRADA || $vacante->status() ==
                        App\Vacante::$FINALIZADA)
                        <x-table-cell>
                            @csrf
                            @if($postulacion->puntaje == null)
                            <div class="form-group mb-2">
                                <input type="text" name="postulacion-{{ $postulacion->id }}"
                                    class="form-control-sm puntaje" style="max-width: 35px">
                            </div>
                            @else
                            {{$postulacion->puntaje}}
                            @endif
                        </x-table-cell>
                        @endif
                    </x-table-row>
                    @endforeach
                </x-table>
                @if($vacante->status() == App\Vacante::$CERRADA && Auth::user()->id_rol ==
                App\Rol::$RESPONSABLE_ADMINISTRATIVO)
                <div class="d-block mx-auto">
                    <input type="submit" class="btn btn-primary btn-sm " value="Publicar Orden de Mérito" />
                </div>
                @endif
            </form>
            @endif
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
@parent
<script type="text/javascript">
    function validatePuntajes(){
            var length = $(".puntaje").length;
            console.log(length)
            $(".puntaje").each(function(index, element){
                if(!parseInt(element.value)){
                    return false;
                }
                if (index === (length - 1)) {
                    return true;
                }
            });
        }
</script>
@endsection