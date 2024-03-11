<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PuntosInteresController;
use App\Http\Controllers\RutasController;
use App\Http\Controllers\ArchivoController;

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
    return ['Laravel' => app()->version()];
    // return view('welcome');
});

require __DIR__.'/auth.php';

Route::get('/crearToken', [ProfileController::class, 'crearToken'])->name('profile.crearToken');

Route::post('/mapa-puntos', [PuntosInteresController::class, 'getPuntos'])->name('getPuntos');

Route::post('/get-rutas', [RutasController::class, 'getRutas'])->name('getRutas');

Route::post('/puntos-trabajos', [PuntosInteresController::class, 'getPuntosConTrabajos'])->name('getPuntosConTrabajos');

Route::get('/trabajos', [PuntosInteresController::class, 'getTrabajos'])->name('getTabajos');

Route::post('/planificar-ruta', [RutasController::class, 'storeRuta'])->name('storeRuta');

Route::post('/encontrar-ruta/{id}', [RutasController::class, 'getRuta'])->name('getRuta');

Route::put('/editar-ruta/{id}', [RutasController::class, 'updateRuta'])->name('updateRuta');

Route::delete('/borrar-ruta', [RutasController::class, 'deleteRuta'])->name('deleteRuta');

Route::post('/subir-imagen', [ArchivoController::class, 'subirImagen'])->name('subirImagen');
