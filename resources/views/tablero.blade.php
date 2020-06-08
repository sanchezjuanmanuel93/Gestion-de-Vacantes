@extends('layouts.logged')

@section('title')
Inicio
@endsection

@section('logged-content')
<div class="row justify-content-around pt-5">
    @foreach ($menuItems as $item)
        <x-home-button :menuItem="$item" />
    @endforeach
</div>
@endsection