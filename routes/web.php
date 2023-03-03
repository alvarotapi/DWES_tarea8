<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultarLibros;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('libros/buscar', [ConsultarLibros::class, 'buscar_libros']);
Route::post('libros/consultar', [ConsultarLibros::class, 'consultar_libros']);