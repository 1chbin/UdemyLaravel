<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use id;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class PerfilController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('perfil.index');
    }

    public function store(Request $request){
        $request->merge([
            'username' => Str::slug($request->username),
        ]);
    
        // en lugar de $this->validate(...)
        $data = $request->validate([
            'username' => ['required','unique:users,username,'. Auth::user()->id ,'min:3','max:20'],
            'password' => 'required'
        ]);

        if (! Hash::check($request->password, Auth::user()->password)) {
            return back()->withErrors(['password' => 'La contraseña ingresada no coincide']);
        }

        if($request->imagen){
            $manager = new ImageManager(new Driver());

            $imagen = $request->file('imagen');

            //generar un id unico para las imagenes
            $nombreImagen = Str::uuid() . "." . $imagen->extension();

            //guardar la imagen al servidor
            $imagenServidor = $manager->read($imagen);
            //agregamos efecto a la imagen con intervention
            $imagenServidor->cover(1000, 1000);
            // la unidad de mide en PX 1= 1pixiel

            //agregamos la imagen a la  carpeta en public donde se guardaran las imagenes
            $imagenesPath = public_path('perfiles') . '/' . $nombreImagen;
            
            //Una vez procesada la imagen entonces guardamos la imagen en la carpeta que creamos
            $imagenServidor->save($imagenesPath);
        }

        //Guardar cambios
        $usuario = User::find(Auth::user()->id);

        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? Auth::user()->imagen ?? null;
        $usuario->save();

        return redirect()->route('posts.index', $usuario->username);

    }
}
