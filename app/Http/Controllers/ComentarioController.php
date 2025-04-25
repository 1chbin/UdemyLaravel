<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function store(Request $request,User $user, Post $post){

        //validar

        $request->validate([
            'comentario' => 'required|max:100'
        ]);

        //almacenar el resultado

        Comentario::create([
            'user_id'    => Auth::user()->id,
            'post_id'    => $post->id,       // ← CORRECTO
            'comentario' => $request->comentario,
        ]);

        //Imprimir un mensaje

    }
}
