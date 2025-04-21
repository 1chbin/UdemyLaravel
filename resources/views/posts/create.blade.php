@extends('layouts.app')

@section('titulo')
    Crea una nueva publicacion
@endsection

@section('contenido')
    <div class="md:flex md:items-center">
        
        <div class="md:w-1/2 px-10">
            img
        </div>

        <div class="md:w-1/2 px-10 bg-white p-5 rounded-lg shadow mt-10 md:mt-0">
            <form action="/crearCuenta" method="POST" novalidate>
                @csrf

                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-600 font-bold">
                        Titulo
                    </label>
                    <input class="border p-3 w-full rounded-lg @error('titulo') border-red-500 @enderror" type="text" id="titulo" name="titulo" placeholder="Ingresa un titulo" value="{{old('titulo')}}">
                    @error('titulo')
                        <p class=" text-red-600">{{ $message }}</p>
                    @enderror
                    
                </div>

                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-600 font-bold">
                        Descripcion
                    </label>

                    <textarea class="border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror" id="descripcion" name="descripcion" placeholder="Escribe la descripcion"></textarea>

                    @error('descripcion')
                        <p class=" text-red-600">{{ $message }}</p>
                    @enderror
                    
                    <input type="submit" value="Crear Publicacion" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg mt-5">


                </div>

            </form>
        </div>

    </div>
@endsection

