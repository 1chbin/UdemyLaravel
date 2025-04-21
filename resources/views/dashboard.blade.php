@extends('layouts.app')

@section('titulo')
Perfil: {{ $user->username }}
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col md:flex-row items-center">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{asset('img/usuario.svg')}}" alt="Imagen de usuario">
            </div>
            <div class="items-center py-10 md:py-10 md:w-8/12 lg:w-6/12 md:flex md:flex-col md:justify-center">

                <p class="text-gray-800 text-2xl">{{$user->username}}</p>
                
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class="font-normal"> Seguidores</span>
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class="font-normal"> Siguiendo</span>
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class="font-normal"> Posts</span>
                </p>

            </div>
        </div>
    </div>
@endsection
