@extends('layouts.app')

@section('titulo')
    HomePage @php
        echo date('Y');
    @endphp
@endsection

@section('contenido')
    Contenido
    <h2 class="text-3xl underline"></h2>
@endsection
