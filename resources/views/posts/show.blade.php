@extends('layouts.app')

@section('titulo')
    {{$post->titulo}}
@endsection

@section('contenido')

    <div class="container md:flex mx-auto flex justify-center content-center">

        <div class="md:w-2/5">
            <img class="rounded-4xl" src="{{asset('uploads') . '/' . $post->imagen}}" alt="Imagen del post {{$post->titulo}}">
        
            <div class="p-3">
                <p>0 likes</p>
            </div>

            <div>
                <p class="font-bold"> {{$post->user->username}}</p>
                <p class="text-sm text-gray-500">{{$post->created_at->diffForHumans()}}</p>
                <p class="mt-5">{{$post->descripcion}}</p>
            </div>
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

                            <div class="p-1 m-2 bg-gray-200 shadow rounded">
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

