<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PuntosInteresController;

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
Route::get('/mapa-puntos', [PuntosInteresController::class, 'getPuntos'])->name('getPuntos');
Route::get('/puntos-trabajos', [PuntosInteresController::class, 'getPuntosConTrabajos'])->name('getPuntosConTrabajos');
Route::get('/trabajos', [PuntosInteresController::class, 'getTrabajos'])->name('getTabajos');
