<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;  

abstract class Controller
{
    use AuthorizesRequests;
    use ValidatesRequests;
}

class RegisterController extends Controller{
    public function index(){
        return view('auth.crearCuenta');
    }

    public function store(Request $request){
        //dd($request);
        /*dd($request->get('name'));
        dd($request->get('username'));
        dd($request->get('email'));*/

        $request->request->add(['username' => Str::slug($request->username)]);

        $this ->validate($request, [
            'name' => 'required|min:2|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);

        /*$validated = $request->validate([
            'name' => 'required|min:4',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email',
        ]);*/

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Auth::attempt($request->only('email','password'));

        return redirect()->route('posts.index');

    }
}
