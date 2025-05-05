@extends('layouts.app')

@section('titulo')
    HomePage @php
        echo date('Y');
    @endphp
@endsection

@section('contenido')
    
    @if ($posts->count())
    <div class=" grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($posts as $post)

            <div class="hover:scale-103 transition duration-200">

                {{-- IMAGEN DE PUBLICACION --}}
                <a href="{{route('posts.show',['post' => $post, 'user' => $post->user])}}">
                    <img class="rounded hover:shadow" src="{{asset('uploads') . '/' . $post->imagen}}" alt="Publicacion:{{$post->titulo}}">
                </a>

                {{-- USUARIO --}}
                <div class="w-3 px-5">
                    <a href="{{route('posts.index', $post->user->username)}}">
                        <p class="font-bold text-gray-500 text-sm pt-2"> {{$post->user->username}}</p>
                    </a>
                </div>

            </div>

        @endforeach
    </div>  

    <div class="my-10">
        {{$posts->links('pagination::tailwind')}}
    </div>
    @else
        <p class="text-center">No hay posts, tienes que seguir a alguien para poder visualizar posts</p>
    @endif

    {{-- OTRA MANERA DE HACERLO

    @forelse ($posts as $post)
        <h1>{{$post->titulo}}</h1>
    @empty
        
    @endforelse --}}

@endsection

