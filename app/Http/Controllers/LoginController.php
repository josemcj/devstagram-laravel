<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email'     => ['required', 'email'],
            'password'  => 'required'
        ]);

        /**
         * Autenticar al usuario.
         * `auth()->attempt($request->only('email', 'password'))` retorna `true` o `false`. Si
         * returna `false` quiere decir que no pudo autenticarlo, asi que mandamos un
         * mensaje de error con `back()->width()` que lo guarda en una sesion `session()`.
         *
         * Este mensaje lo mostramos en el formulario con `session()`.
         *
         * Con `back()` podemos regresar a la pagina anterior, en este caso a formulario de login.
         */
        if(! auth()->attempt($request->only('email', 'password')) ) {
            return back()->with('mensaje', 'Usuario y/o contraseña incorrectos');
        }

        /**
         * Si el usuario de autentico correctamente.
         */
        return redirect()->route('posts.index');
    }
}
