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
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
    </div>
    <div class="card-body">
        The styling for this basic card example is created by using default Bootstrap utility classes. By using utility
        classes, the style of the card component can be easily modified with no need for any custom CSS!
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
    </div>
    <div class="card-body">
        The styling for this basic card example is created by using default Bootstrap utility classes. By using utility
        classes, the style of the card component can be easily modified with no need for any custom CSS!
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
    </div>
    <div class="card-body">
        The styling for this basic card example is created by using default Bootstrap utility classes. By using utility
        classes, the style of the card component can be easily modified with no need for any custom CSS!
    </div>
</div>
@endsection