<?php

namespace App\Http\Controllers;

use App\Http\Resources\PuntosCollection;
use App\Models\PuntoInteres;
use Illuminate\Http\Request;

class PuntosInteresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function getPuntos(){
        $puntosInteres = PuntoInteres::all();
        return response()->json($puntosInteres);
    }

    public function getPuntosConTrabajos(){
        $relaciones = ['trabajos'];
        $puntos = PuntoInteres::with($relaciones);
        return new PuntosCollection($puntos->get());
    }
}
