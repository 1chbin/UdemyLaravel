<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

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

        $this ->validate($request, [
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required'
        ]);

        /*$validated = $request->validate([
            'name' => 'required|min:4',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email',
        ]);*/
    }
}
