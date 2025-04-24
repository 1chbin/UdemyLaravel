<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Container\Attributes\Auth;

class ComentarioController extends Controller
{
    public function store(Request $request, User $user ,Post $post){

        //validar

        $request->validate([
            'comentario' => 'required|max:100'
        ]);

        //almacenar el resultado

        Comentario::create([
            'user_id' => Auth::user()->id,
            'post-id' => $post->id,
            'comentario' => $request->comentario
        ]);

        //Imprimir un mensaje

    }
}
