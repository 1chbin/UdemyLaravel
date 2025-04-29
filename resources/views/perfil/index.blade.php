@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{auth()->user()->username}}
@endsection

@section('contenido')

    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">

            <form action="{{route('perfil.store')}}" class="mt-10 md:mt-0" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- USERNAME --}}
                <div class="mb-5">

                    <label for="username" class="mb-2 block uppercase text-gray-600 font-bold">
                        Tu Username
                    </label>

                    <input class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" 
                        type="text" 
                        id="username" 
                        name="username" 
                        placeholder="Tu Nombre de Usuario" 
                        value="{{auth()->user()->username}}">

                    @error('username')
                        <p class=" text-red-600">{{ $message }}</p>
                    @enderror

                </div>

                {{-- IMAGEN DE PERFIL --}}
                <div class="mb-5">

                    <label for="imagen" class="mb-2 block uppercase text-gray-600 font-bold">
                        Imagen De Perfil
                    </label>

                    <input class="border bg-gray-100 text-gray-500 text-sm font-bold p-3 w-full rounded-lg cursor-pointer" 
                        type="file" 
                        accept=".jpg"
                        id="imagen" 
                        name="imagen" 
                        placeholder="Tu Imagen" 
                        value="">

                    @error('imagen')
                        <p class=" text-red-600">{{ $message }}</p>
                    @enderror

                </div>

                {{-- CONTRASEÑA --}}
                <div class="mb-5">

                    <label for="password" class="mb-2 block uppercase text-gray-600 font-bold">
                        Tu Contraseña
                    </label>

                    <input class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Tu Contraseña" 
                        value="">

                    @error('password')
                        <p class=" text-red-600">{{ $message }}</p>
                    @enderror

                </div>

                <input type="submit" value="Guardar Cambios" class="bg-sky-600 hover:bg-sky-700 cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg hover:scale-103 hover:shadow-lg transition ease-out duration-300">

            </form>

        </div>
    </div>

@endsection

