@extends('layouts.app')

@section('titulo')
    Registrate en Devstagram
@endsection

@section('contenido')
    Aqui podras registrarte
    <div class="md:flex md:justify-center md:gap-6 md:items-center">
        <div class="md:w-1/3">
            <img src="{{ asset('img/registrar.jpg') }}" alt="Imagen de resgistro de usuarios">
        </div>
        <div class="md:w-1/2">
            <form>
                <div class="bg-white p-5 rounded-lg shadow">
                    <form>

                        <div class="mb-5">
                            <label for="Nombre" class="mb-2 block uppercase text-gray-600 font-bold">
                                Tu Nombre
                            </label>
                            <input class="border p-3 w-full rounded-lg" type="text" id="Nombre" name="name" placeholder="Tu Nombre de Usuario">
                        </div>

                        <div class="mb-5">
                            <label for="Username" class="mb-2 block uppercase text-gray-600 font-bold">
                                Username
                            </label>
                            <input class="border p-3 w-full rounded-lg" type="text" id="Username" name="name" placeholder="Tu Nombre de Usuario">
                        </div>

                        <div class="mb-5">
                            <label for="Email" class="mb-2 block uppercase text-gray-600 font-bold">
                                Tu Email
                            </label>
                            <input class="border p-3 w-full rounded-lg" type="email" id="Email" name="Email" placeholder="Tu direccion e-mail">
                        </div>
                    
                        <div class="mb-5">
                            <label for="Password" class="mb-2 block uppercase text-gray-600 font-bold">
                                Contraseña
                            </label>
                            <input class="border p-3 w-full rounded-lg" type="password" id="Password" name="Password" placeholder="Tu Contraseña">
                        </div>

                        <div class="mb-5">
                            <label for="PasswordConfirmation" class="mb-2 block uppercase text-gray-600 font-bold">
                                Repetir Contraseña
                            </label>
                            <input class="border p-3 w-full rounded-lg" type="password" id="PasswordConfirmation" name="PasswordConfirmation" placeholder="Tu Contraseña">
                        </div>

                        <input type="submit" value="Crear Cuenta" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">

                    </form>
                </div>
            </form>
        </div>
    </div>
@endsection
