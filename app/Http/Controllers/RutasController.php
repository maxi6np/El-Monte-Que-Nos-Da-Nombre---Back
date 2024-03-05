<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoriasPCollection;
use App\Models\Ruta;
use App\Models\User;
use App\Models\PuntoInteres;
use Illuminate\Http\Request;
use App\Http\Resources\RutasResource;
use App\Http\Resources\RutasCollection;
use App\Models\CategoriaP;
use Laravel\Sanctum\PersonalAccessToken;

class RutasController extends Controller
{
    public function getRutas(Request $request)
    {
        $relaciones = ['puntos_interes.categorias'];
        $categorias = new CategoriasPCollection(CategoriaP::all());
        if ($request->filled('token')) {
            $userID = PersonalAccessToken::findToken($request->token)->tokenable_id;
            $rutas = Ruta::with($relaciones)->where('publica', '=', true)->orWhere('id_usuario', '=', $userID)->get();
            $RutasResources = [];
            foreach($rutas as $ruta){
                $rutaResource = new RutasResource($ruta);
               $rutaResource->porcentaje($this->getPorcentaje($userID, $ruta));

                array_push($RutasResources, $rutaResource);
            }
            $RutaCollection = new RutasCollection($RutasResources);
            return $RutaCollection->additional(['categorias' => $categorias]) ;

        } else {
            $rutas = Ruta::with($relaciones)->where('publica', true);
            $RutaCollection = new RutasCollection($rutas->get());
            return $RutaCollection->additional(['categorias' => $categorias]) ;
        }


    }
    public function getPorcentaje($userID, Ruta $ruta){
        $visitados = [];
        foreach($ruta->puntos_interes as $punto_interes){
            foreach($punto_interes->visitados as $visita){
                if($visita->id_usuario == $userID && $visita->visita->completado == true){
                    array_push($visitados, $visita);
                }

        }
    }
        $porcentaje = (sizeof($visitados) / sizeof($ruta->puntos_interes)) * 100;
        return round($porcentaje);
    }
}
