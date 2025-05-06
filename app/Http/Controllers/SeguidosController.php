<?php

namespace App\Http\Controllers;

use App\Models\User;

class SeguidosController extends Controller
{
    public function index(User $user)
    {
        $usuarios = $user->followings()->paginate(20);
    
        return view('perfil.siguiendo', [
            'usuarios' => $usuarios,
            'user'     => $user,
        ]);
    }
}