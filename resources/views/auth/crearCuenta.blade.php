@extends('layouts.app')

@section('titulo')
    Registrate en Devstagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-6 md:items-center">
        <div class="md:w-1/3">
            <img class="rounded-xl" src="{{ asset('img/registrar.jpg') }}" alt="Imagen de resgistro de usuarios">
        </div>

                <div class="bg-white p-5 rounded-lg shadow md:w-1/2">
                    <form action="/crearCuenta" method="POST" novalidate>
                        @csrf
                        <div class="mb-5">
                            <label for="name" class="mb-2 block uppercase text-gray-600 font-bold">
                                Tu Nombre
                            </label>
                            <input class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" type="text" id="name" name="name" placeholder="Tu Nombre de Usuario" value="{{old('name')}}">
                            @error('name')
                                <p class=" text-red-600">{{ $message }}</p>
                            @enderror
                            
                        </div>

                        <div class="mb-5">
                            <label for="username" class="mb-2 block uppercase text-gray-600 font-bold">
                                Username
                            </label>
                            <input class="border p-3 w-full rounded-lg" type="text" id="username" name="username" placeholder="Tu Nombre de Usuario">
                            @error('username')
                                <p class=" text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

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

                        <div class="mb-5">
                            <label for="password_confirmation" class="mb-2 block uppercase text-gray-600 font-bold">
                                Repetir Contraseña
                            </label>
                            <input class="border p-3 w-full rounded-lg" type="password" id="password_confirmation" name="password_confirmation" placeholder="Tu Contraseña">
                        </div>

                        <input type="submit" value="Crear Cuenta" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">

                    </form>
                </div>
        
    </div>
@endsection
