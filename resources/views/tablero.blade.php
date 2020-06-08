@extends('layouts.logged')

@section('title')
Inicio
@endsection

@section('logged-content')
<div class="row justify-content-around pt-5">
    <x-home-button routeName="alta-vacante" displayName="Abrir Vacante" iconName="fa-plus" />
    <x-home-button routeName="consultar-vacantes-abiertas" displayName="Consultar Vacantes Abiertas"
        iconName="fa-list-ul" />
    <x-home-button routeName="consultar-vacantes" displayName="Consultar Vacantes Abiertas" iconName="fa-list-ul" />
    <x-home-button routeName="consultar-postulaciones" displayName="Mis Postulaciones" iconName="fa-list-ul" />
    <x-home-button routeName="alta-usuario" displayName="Crear Usuario" iconName="fa-plus" />
    <x-home-button routeName="consultar-usuarios" displayName="Consultar Usuarios" iconName="fa-list-ul" />
    <x-home-button routeName="consultar-faqs" displayName="Consultar FAQs" iconName="fa-info-circle" />
    <x-home-button routeName="solicitar-soporte" displayName="Solicitar Soporte" iconName="fa-question-circle" />
</div>
@endsection