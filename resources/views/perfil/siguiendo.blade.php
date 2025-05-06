@extends('layouts.app')

@section('titulo')
    Seguidos
@endsection

@section('contenido')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Usuarios que sigues</h1>

        @forelse ($usuarios as $usuario)
            <div class="mb-4 border-b pb-2">
                <div class="w-8/12 lg:w-6/12 px-5">
                    <img src="{{ $usuario->imagen ? asset('perfiles') . '/' . $user->imagen : asset('img/usuario.svg')}}" alt="Imagen de usuario" class="rounded-full shadow hover:scale-101 hover:shadow-2xl hover:transition hover:duration-300">
                </div>
                <p class="text-lg font-semibold">{{ $usuario->username }}</p>
            </div>
        @empty
            <p>No sigues a nadie todavía.</p>
        @endforelse
    </div>
@endsection

