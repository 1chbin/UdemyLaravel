<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Colors\Rgb\Channels\Red;

class PostController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function index(User $user){

        $posts = Post::where('user_id', $user->id)->paginate(10);

        return view('dashboard', [
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function create(){
        return view('posts.create');
    }

    //requerimientos de publlicaciones
    public function store(Request $request){
        $request->validate([
            'titulo' => 'required|max:100',
            'descripcion' => 'required',
            'imagen'=>'required'
        ]);

        //otra forma
        // Post::create([
        //     'titulo' => $request->titulo,
        //     'descripcion' => $request->descripcion,
        //     'imagen' => $request->imagen,
        //     'user_id' => Auth::user()->id
        // ]);

        //campos necesarios
        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('posts.index', Auth::user()->username);
    }
}
