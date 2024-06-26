<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        /**
         * El middleware es el primero que se ejecuta antes que cualquier otra cosa.
         * con este método `middleware` indicamos que se debe ejecutar el método `auth`
         * que verificará la sesión.
         * Si no hay una sesión activa redirecciona a `/login`.
         */
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        /**
         * Pasamos informacion a la vista en el segundo parametro que toma esra funcion.
         */
        return view('dashboard', [
            'user' => $user
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }
}
