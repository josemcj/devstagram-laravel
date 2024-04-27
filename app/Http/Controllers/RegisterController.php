<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

/**
 * CONVENCIONES PARA NOMBRAR METODOS.
 *
 * Cuando realizamos una peticion GET llamamos al método: `index`.
 * Cuando es una petición POST, debido a que es para almacenar información, lo ideal es que el
 * método se llame `store`.
 * Para una petición el método se llama `destroy`.
 * @see https://laravel.com/docs/9.x/controllers#actions-handled-by-resource-controller
 */

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
        $request->request->add(['username' => Str::slug($request->username)]);

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
            'password'  => 'required|confirmed|min:6'
        ]);

        /**
         * Para crear un registro llamamos al modelo y usamos el método estático `create`.
         * `slug` genera un slug de URL. Elimina los espacios y los sustituye por guiones bajos.
         */
        User::create([
            'name' => $request->name,
            'username' => $request->username, // Str::slug($request->username) -> También puede ser así
            'email' => $request->email,
            'password' => $request->password,
        ]);

        /**
         * Autenticar el usuario.
         * Retorna `true` o `false` si pudo autenticarlo.
         */
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);

        // Otra forma de autenticar
        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('posts.index', $request->username);
    }
}
