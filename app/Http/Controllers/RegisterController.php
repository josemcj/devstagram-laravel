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
}
