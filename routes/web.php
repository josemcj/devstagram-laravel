<?php

use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('principal');
});

/**
 * Definimos la ruta y en vez de llamar a una  función, le pasamos en un arreglo
 * el nombre del controlador que queremos utilizar, añadiendole `::class`, seguido del
 * nombre del método que llama a la view.
 *
 * `name('ruta')` lo utilizamos como un alias. Cada vez que indiquemos a la ruta con el nombre
 * ingresado dentro de `name`  redirigirá a la ruta donde corresponda.
 */
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

/**
 * Route Model Binding.
 *
 * La ruta se asocia a un modelo y cuando le pasamos un parametro busca por el ID (por defecto) en
 * la base de datos y pasa la informacion automaticamente al metodo introducido.
 *
 * Podemos especificar cual es la columna por la que debera buscar en la base de datos.
 */
Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');

/**
 * Subir imagenes al servidor.
 */
Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');
