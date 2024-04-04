<?php

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
