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
use Carbon\Carbon;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Validator;

class RutasController extends Controller
{
    public function getRutas(Request $request)
    {
        $relaciones = ['puntos_interes.categoriasPuntos'];
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
            return $RutaCollection->additional(['categoriasPuntos' => $categorias]) ;

        } else {
            $rutas = Ruta::with($relaciones)->where('publica', true);
            $RutaCollection = new RutasCollection($rutas->get());
            return $RutaCollection->additional(['categoriasPuntos' => $categorias]) ;
        }


    }
    public function getPorcentaje($userID, Ruta $ruta){
        $visitados = [];
        $user = User::find($userID);
        if($ruta->realiza->contains($user)){
        foreach($ruta->puntos_interes as $punto_interes){
            foreach($punto_interes->visitados as $visita){
                if($visita->id_usuario == $userID && $visita->visita->completado == true){
                    array_push($visitados, $visita);
                }

        }
    }
        $porcentaje = (sizeof($visitados) / sizeof($ruta->puntos_interes)) * 100;
        return round($porcentaje);}
        return -1;

    }

    public function storeRuta(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'nombre' => ['required', 'string', 'max:255'],
                'descripcion' => ['required', 'string'],
                'puntos' => ['required', 'array', 'min:1'],
                'puntos.*' => ['required'],
                'imagen_`principal' => ['nullable', 'file']
            ]);

            $nuevaRuta = Ruta::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'fecha_creacion' => Carbon::now(),
                'duracion' => 4,
                'dificultad' => 'media',  
                'imagen_principal' => $request->imagen_principal,
                'publica' => $request->publica,
                'id_usuario' =>  PersonalAccessToken::findToken($request->token)->tokenable_id
            ]);

            $nuevaRuta->puntos_interes()->attach(
                $request->puntos
            );

            return response()->json(['message' => 'Ruta creada correctamente', $nuevaRuta], 201);

            if ($validator->fails()) {
                return response()->json(['message' => 'La validación ha fallado', 'errors' => $validator->errors()], 400);
            }
        } catch (\Illuminate\Database\QueryException $exception) {
            return response()->json(['message' => 'Error al procesar la solicitud', $exception->getMessage()], 500);
        }
    }
}
