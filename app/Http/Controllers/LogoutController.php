<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store()
    {
        /**
         * Usamos el helper de `auth` para cerrar sesion.
         * Despues redireccionamos el usuario al login.
         */
        auth()->logout();
        return redirect()->route('login');
    }
}
