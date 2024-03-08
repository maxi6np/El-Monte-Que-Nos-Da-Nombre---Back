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
            $relaciones = ['visitados'];
            $puntos = PuntoInteres::with($relaciones)->get();
            return new PuntosCollection($puntos);
        }
    }


    public function getPuntosConTrabajos(Request $request)
    {

        $relaciones = ['trabajos.categoriasTrabajos'];
        $puntosInteres = PuntoInteres::with($relaciones)->get();
        if ($request->filled('token')) {
            $userID = PersonalAccessToken::findToken($request->token)->tokenable_id;
            $puntosConVisita = [];
            foreach ($puntosInteres as $punto) {
                $puntoResource = new PuntosResource($punto);
                $i = 0;
                $check = 0;
                while ($i < sizeof($punto->visitados) && $check == 0) {
                    if ($punto->visitados[$i]->id_usuario == $userID && $punto->visitados[$i]->visita->completado == true) {
                        $puntoResource->setVisitado(true);
                        $check = 1;
                    }
                    $i++;
                }
                array_push($puntosConVisita, $puntoResource);
            }
            return new PuntosCollection($puntosConVisita);
        }
        return new PuntosCollection($puntosInteres);
    }

    public function getTrabajos()
    {
        $puntosInteres = Trabajo::all();
        return response()->json($puntosInteres);
    }
}
