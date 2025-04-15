<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;   

class PostController extends Controller
{
    public function index(){
        return view('dashboard');
    }
}

//session_start();

//$_SESSION['email'] = $resultado['email'];