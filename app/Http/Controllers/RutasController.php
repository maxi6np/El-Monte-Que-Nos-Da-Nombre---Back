<?php

namespace App\Http\Controllers;

use App\Http\Resources\RutasCollection;
use App\Models\PuntoInteres;
use App\Models\Ruta;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class RutasController extends Controller
{
    public function getRutas(Request $request)
    {
        $relaciones = ['puntos_interes'];
        if ($request->filled('token')) {
            $userID = PersonalAccessToken::findToken($request->token)->tokenable_id;
            $rutas = Ruta::with($relaciones)->where('publica', '=', true)->orWhere('id_usuario', '=', $userID);
        } else {
            $rutas = Ruta::with($relaciones)->where('publica', true);
        }

        return new RutasCollection($rutas->get());
    }
}
