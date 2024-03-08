<?php

namespace App\Http\Controllers;

use App\Models\Trabajo;
use App\Models\PuntoInteres;
use Illuminate\Http\Request;
use App\Http\Resources\PuntosResource;
use App\Http\Resources\PuntosCollection;
use Laravel\Sanctum\PersonalAccessToken;

class PuntosInteresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $userID;

    public function getPuntos(Request $request)
    {

        if ($request->filled('token')) {
            $this->userID = PersonalAccessToken::findToken($request->token)->tokenable_id;
            $relaciones = ['visitados'=> function ($q) {
                $q->where('visita.id_usuario', '=', $this->userID)->where('visita.completado', '=', true);
            }];
            $puntos = PuntoInteres::with($relaciones)->get();
            return new PuntosCollection($puntos);
        } else {
            $puntos = PuntoInteres::all();
            return new PuntosCollection($puntos);
        }
    }


    public function getPuntosConTrabajos(Request $request)
    {

        if ($request->filled('token')) {
            $this->userID = PersonalAccessToken::findToken($request->token)->tokenable_id;
            $relaciones = ['trabajos.categoriasTrabajos', 'visitados'=> function ($q) {
                $q->where('visita.id_usuario', '=', $this->userID)->where('visita.completado', '=', true);
            }];
            $puntos = PuntoInteres::with($relaciones)->get();
            return new PuntosCollection($puntos);
        } else {
            $relaciones = ['trabajos.categoriasTrabajos'];
            $puntos = PuntoInteres::with($relaciones)->get();
            return new PuntosCollection($puntos);
        }
    }

    public function getTrabajos()
    {
        $puntosInteres = Trabajo::all();
        return response()->json($puntosInteres);
    }
}
