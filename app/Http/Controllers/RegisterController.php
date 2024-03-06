<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Retorna la vista  del formulario de registro.
     * Esta vista se encuentra en `resources/views/auth/register.blade.php`.
     */
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        /**
         * dd() es un método en Laravel que nos sirve para debuguear.
         * Imprime lo que le mandemos y detiene la ejecución.
         *
         * dd($request->request); // Lo enviado en el formulario
         * dd($request->get('email')); // Obtener un valor en específico.
         */

        /**
         * Para validar los campos usamos el método `validate()`, al cual le pasamos
         * un arreglo que incluye el campo y sus reglas.
         *
         * Se puede validar varias cosas, separadoas por plecas o enviarse en forma
         * de arreglo.
         */
        $this->validate($request, [
            'name'      => 'required|min:5',
            'username'  => ['required', 'unique:users', 'min:3', 'max:30'],
            'email'     => ['required', 'unique:users', 'email', 'max:60'],
            'password'  => 'required'
        ]);
    }
}
