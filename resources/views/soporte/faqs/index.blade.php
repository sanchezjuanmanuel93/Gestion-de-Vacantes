@extends('layouts.logged')
@section('title')
Consultar FAQs
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('inicio.index')}}">Inicio</a></li>
<li class="breadcrumb-item">Soporte</li>
<li class="breadcrumb-item active" aria-current="page"><a href="{{route('soporte.faqs.index')}}">Consultar FAQs</a></li>
@endsection
@section('logged-content')
@foreach ($faqs as $faq)
    <div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">{{$faq->question}}</h6>
    </div>
    <div class="card-body">
        {{$faq->answer}}
    </div>
</div>
@endforeach
@endsection