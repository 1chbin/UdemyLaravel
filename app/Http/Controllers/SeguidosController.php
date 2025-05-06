<?php

namespace App\Http\Controllers;

use App\Models\User;

class SeguidosController extends Controller
{
    public function index(User $user)
    {
        $usuarios = $user->followings()->paginate(20);
    
        // Ahora busca resources/views/perfil/siguiendo.blade.php
        return view('perfil.siguiendo', [
            'usuarios' => $usuarios,
            'user'     => $user,
        ]);
    }
}