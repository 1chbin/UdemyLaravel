@extends('layouts.app')

@section('titulo')
    Seguidos
@endsection

@section('contenido')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Usuarios que sigues</h1>

        @forelse ($usuarios as $usuario)
            <div class=" flex mb-4 pb-2 content-center items-center">
                <div class="w-1/18 lg:w-1/12 px-5">
                    <img src="{{ $usuario->imagen ? asset('perfiles') . '/' . $usuario->imagen : asset('img/usuario.svg')}}" alt="Imagen de usuario" class="rounded-full shadow hover:scale-101 hover:shadow-xl hover:transition hover:duration-300">
                </div>
                
                <a href="{{route('posts.index', $usuario->username)}}">
                    <p class="text-lg text-gray-700 font-semibold hover:text-shadow hover:font-black hover:text-black hover:scale-102 transition duration-300">{{ $usuario->username }}</p>
                </a>
            </div>
        @empty
            <p>No sigues a nadie todavía.</p>
        @endforelse
    </div>
@endsection

