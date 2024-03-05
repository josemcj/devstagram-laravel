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
 */
Route::get('/crear-cuenta', [RegisterController::class, 'index']);
