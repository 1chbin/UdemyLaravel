@extends('layouts.app')

@section('titulo')
    Inicia sesion en devstagram
@endsection

@section('contenido')
    Aqui podras registrarte
    <div class="md:flex md:justify-center md:gap-6 md:items-center">
        <div class="md:w-1/3">
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen de login de usuarios">
        </div>

                <div class="bg-white p-5 rounded-lg shadow md:w-1/2">
                    <form action="{{route('login')}}" method="POST" novalidate>
                        @csrf

                        @if (session('mensaje'))
                            <p class=" text-red-600">
                                {{session('mensaje')}}
                            </p>
                        @endif

                        <div class="mb-5">
                            <label for="email" class="mb-2 block uppercase text-gray-600 font-bold">
                                Tu Email
                            </label>
                            <input class="border p-3 w-full rounded-lg" type="email" id="email" name="email" placeholder="Tu direccion e-mail">
                            @error('email')
                                <p class=" text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    
                        <div class="mb-5">
                            <label for="password" class="mb-2 block uppercase text-gray-600 font-bold">
                                Contraseña
                            </label>
                            <input class="border p-3 w-full rounded-lg" type="password" id="password" name="password" placeholder="Tu Contraseña">
                            @error('password')
                                <p class=" text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <input type="submit" value="Iniciar Sesion" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">

                    </form>
                </div>
        
    </div>
@endsection
