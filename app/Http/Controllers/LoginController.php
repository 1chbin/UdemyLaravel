<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

class LoginController extends Controller
{
        use ValidatesRequests;
    
        public function store(Request $request){
        $this->validate($request, 
        [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if(!Auth::attempt($request->only('email','password'), $request->remember)){
            return back()->with('mensaje', 'Credenciales incorrectas');
        }

        return redirect()->route('posts.index');
    }
    public function index(){
        return view('auth.login');
    }

    /*public function store(){
        dd('autenticando...');
    }*/

    
}
