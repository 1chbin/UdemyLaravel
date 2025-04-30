@extends('layouts.app')

@section('titulo')
Perfil: {{ $user->username }}
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col md:flex-row items-center">

            {{-- IMAGEN DE USUARIO --}}
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{ $user->imagen ? asset('perfiles') . '/' . $user->imagen : asset('img/usuario.svg')}}" alt="Imagen de usuario" class="rounded-full shadow hover:scale-101 hover:shadow-2xl hover:transition hover:duration-300">
            </div>

            <div class=" py-10 md:py-10 md:w-8/12 lg:w-6/12 md:flex md:flex-col md:justify-center">

                <div class="flex items-center gap-2 mb-2">

                    <p class="text-gray-800 text-2xl">{{$user->username}}</p>

                    {{-- Verificamos si es el usuario propietario --}}
                    @auth
                        @if ($user->id === auth()->user()->id)

                            <a href="{{route('perfil.index', $user)}}" class="text-gray-500 hover:text-gray-800 hover:scale-110 hover:shadow-lg transition ease-out duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </a>

                        @endif
                    @endauth

                </div>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{$user->followers->count()}}
                    {{-- METODO CHOICE PARA PODER ELEGIR LOS STRINGS ENTRE PLURAL Y SINGULAR --}}
                    <span class="font-normal"> @choice('Seguidor|Seguidores', $user->followers->count())</span>
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{$user->followings->count()}}
                    <span class="font-normal">Siguiendo</span>
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{$user->posts->count()}}
                    <span class="font-normal"> Posts</span>
                </p>

                @auth

                    @if ($user->id !== auth()->user()->id)

                        {{-- SEGUIR --}}
                        @if(!$user->siguiendo(auth()->user()))

                            <form action="{{route('users.follow', $user)}}" method="POST">
                                @csrf

                                <input type="submit" value="seguir" class="flex shadow items-center gap-2 bg-blue-400 hover:bg-blue-500 border p-2 text-white rounded-2xl text-sm uppercase font-bold cursor-pointer hover:scale-105 hover:shadow-lg transition ease-out duration-300">

                            </form>

                        {{-- DEJAR DE SEGUIR --}}
                        @else

                            <form action="{{route('users.unfollow', $user)}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <input type="submit" value="dejar de seguir" class="flex shadow items-center gap-2 bg-red-400 hover:bg-red-500 border p-2 text-white rounded-2xl text-sm uppercase font-bold cursor-pointer hover:scale-105 hover:shadow-lg transition ease-out duration-300">

                            </form>

                        @endif

                    @endif

                @endauth

            </div>
        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
        
        @if($posts->count())

        <div class=" grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)

                <div>
                    <a href="{{route('posts.show',['post' => $post, 'user' => $user])}}">
                        <img class="rounded hover:scale-103 hover:shadow transition duration-200" src="{{asset('uploads') . '/' . $post->imagen}}" alt="Publicacion:{{$post->titulo}}">
                    </a>
                </div>

            @endforeach
        </div>  
    
        <div class="my-10">
            {{$posts->links('pagination::tailwind')}}
        </div>

        @else
            <p class="text-gray-500 uppercase text-sm text-center font-black">No Hay Posts</p>
        @endif
    </section>


    
@endsection
