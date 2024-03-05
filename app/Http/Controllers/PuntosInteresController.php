<?php

namespace App\Http\Controllers;

use App\Http\Resources\PuntosCollection;
use App\Models\PuntoInteres;
use App\Models\Trabajo;
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
        $relaciones = ['trabajos.categoriasTrabajos'];
        $puntos = PuntoInteres::with($relaciones)->get();
        return new PuntosCollection($puntos);
    }

    public function getTrabajos()
    {
        $puntosInteres = Trabajo::all();
        return response()->json($puntosInteres);
    }
}
