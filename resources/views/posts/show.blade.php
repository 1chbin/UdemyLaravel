@extends('layouts.app')

@section('titulo')
    {{$post->titulo}}
@endsection

@section('contenido')

    <div class="container md:flex mx-auto flex justify-center content-center">

        <div class="md:w-2/5">
            <img class="rounded-4xl" src="{{asset('uploads') . '/' . $post->imagen}}" alt="Imagen del post {{$post->titulo}}">
        
            {{-- likes --}}
            <div class="p-3 flex items-center">

                @auth

                {{-- VISUALIZACION DE LOS LIKES --}}
                    <livewire:like-post :post="$post"/>
                    
                @endauth
                {{-- <p class="text-gray-700 font-bold text-sm p-1">{{$post->likes->count()}} likes</p> --}}
            </div>

            <div>
                <a href="{{route('posts.index', $post->user->username)}}">
                    <p class="font-bold"> {{$post->user->username}}</p>
                </a>
                <p class="text-sm text-gray-500">{{$post->created_at->diffForHumans()}}</p>
                <p class="mt-5 font-bold text-sm">Descripcion:</p>
                <p class=" text-gray-800">{{$post->descripcion}}</p>
            </div>

            @auth
                @if ($post->user_id === auth()->user()->id)

                    <form method="POST" action="{{route('posts.destroy', $post)}}">
                        {{-- Aqui aplicamos el metodo SPOOFING por primera vez y es importante saberlo. En laravel
                        podemos saber que desde un method solo se pueden usar los GET y POST. Pero con el spoofing 
                        podemos ,incluir mas condiciones como la de eliminar o actualizar registros  --}}
                        @method('DELETE')
                        @csrf
                        <div class="flex w-fit bg-red-500 hover:bg-red-600 mt-5 cursor-pointer p-2 text-white rounded-xl hover:-translate-y-1 hover:scale-105 hover:shadow-lg transition ease-out duration-300">
                            <input value="Eliminar publicacion " type="submit" class="uppercase font-bold cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </div>
                        
                    </form>

                @endif
            @endauth

        </div>

        <div class="md:w-1/2 p-5">

            <div class="shadow bg-white rounded p-5 mb-5">
                <p class="text-xl font-bold text-center mb-4">
                    Agrega un comentario
                </p>

                @auth

                @if (session('mensaje'))
                    <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-black">
                        {{session('mensaje')}}
                    </div>
                @endif

                    <form action="{{route('comentarios.store',['post' => $post, 'user' => $user])}}" method="POST">
                        @csrf
                        
                        <div class="mb-5">

                            <label for="comentario" class="mb-2 block uppercase text-gray-600 font-bold">
                                Comentario
                            </label>

                            <textarea class="border p-3 w-full rounded-lg @error('comentario') border-red-500 @enderror" id="comentario" name="comentario" placeholder="Escribe tu comentario"></textarea>

                            @error('comentario')
                                <p class=" text-red-600">{{ $message }}</p>
                            @enderror

                            <input type="submit" value="Comentar" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg mt-5">

                        </div>
                    </form>
                @endauth

                <div class="bg-white mt-10 shadow mb-5 max-h-96 overflow-y-scroll">
                    @if ($post->comentarios->count())

                        @foreach ($post->comentarios as $comentario)

                            <div class="p-1 m-2 bg-gray-200 shadow rounded hover:scale-101 hover:shadow-lg transition ease-out duration-300">
                                <a class="font-black" href="{{route('posts.index', $comentario->user)}}">
                                    {{$comentario->user->username}}:
                                </a>
                                <p>{{$comentario->comentario}}</p>
                                <p class="font-bold text-gray-400 text-sm">{{$comentario->created_at->diffForHumans()}}</p>
                            </div>

                        @endforeach

                    @else
                        <p class="p-10 text-center">
                            No Hay Comentarios Aun.
                        </p>
                    @endif

                </div>

            </div>
        
        </div>

    </div>

@endsection

