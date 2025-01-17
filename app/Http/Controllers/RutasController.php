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
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class RutasController extends Controller
{
    private $userID;
    public function getRutas(Request $request)
    {

        $categorias = new CategoriasPCollection(CategoriaP::all());
        if ($request->filled('token')) {
            $this->userID = PersonalAccessToken::findToken($request->token)->tokenable_id;
            $relaciones = ['puntos_interes.categoriasPuntos', 'realiza' => function ($q) {
                $q->where('realiza.id_usuario', '=', $this->userID);
            }, 'puntos_interes.visitados' => function ($q) {
                $q->where('visita.id_usuario', '=', $this->userID)->where('visita.completado', '=', true);
            }];
            $rutas = Ruta::with($relaciones)->where('publica', '=', true)->orWhere('id_usuario', '=', $this->userID)->get();
            $RutaCollection = new RutasCollection($rutas);
            return $RutaCollection->additional(['categoriasPuntos' => $categorias, 'request_user_id' => $this->userID]);
        } else {
            $relaciones = ['puntos_interes.categoriasPuntos'];
            $rutas = Ruta::with($relaciones)->where('publica', true);
            $RutaCollection = new RutasCollection($rutas->get());
            return $RutaCollection->additional(['categoriasPuntos' => $categorias]);
        }
    }


    public function storeRuta(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nombre' => ['required', 'string', 'max:255'],
                'descripcion' => ['required', 'string'],
                'puntos' => ['required', 'array', 'min:1'],
                'puntos.*' => ['required'],
                'imagen_`principal' => ['nullable', 'file']
            ]);

            $imagen_principal = null;
            // Si existe imagen, se guarda en el back con un nombre específico
            if ($request->hasFile('imagen_principal')) {
                $imagen = $request->file('imagen_principal');
                $nombreImagen = 'ruta' . $request->nombre . '_img.' . $imagen->getClientOriginalExtension();
                $rutaImagen = Storage::disk('public_assets')->putFileAs('uploads', $imagen, $nombreImagen);
                $imagen_principal = $rutaImagen;
            } else {
                if ($request->has('puntos') && !empty($request->puntos)) {
                    $primerPuntoInteresId = $request->puntos[0];
                    $primerPuntoInteres = PuntoInteres::find($primerPuntoInteresId);
                    $imagen_principal = $primerPuntoInteres->imagen;
                }
            }


            $nuevaRuta = Ruta::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'fecha_creacion' => Carbon::now(),
                'duracion' => 4,
                'dificultad' => 'media',
                'imagen_principal' => $imagen_principal,
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

    public function getRuta(Int $ruta, Request $request)
    {
        $this->userID = PersonalAccessToken::findToken($request->token)->tokenable_id;

        $rutaEdit = Ruta::find($ruta)->load(['puntos_interes']);

        return new RutasResource($rutaEdit);
    }
    public function deleteRuta(Request $request)
    {
        $id_ruta = $request->input('id_ruta');
        $ruta = Ruta::find($id_ruta);

        if ($ruta) {
            $ruta->delete();
            return response()->json(['message' => 'Ruta eliminada correctamente']);
        } else {
            return response()->json(['message' => 'No se ha podido encontrar la ruta'], 404);
        }
    }

    public function updateRuta(Int $ruta, Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nombre' => ['required', 'string', 'max:255'],
                'descripcion' => ['required', 'string'],
                'puntos' => ['required', 'array', 'min:1'],
                'puntos.*' => ['required'],
                'imagen_`principal' => ['nullable', 'file']
            ]);
           

            $rutaUpdate = Ruta::find($ruta);


            $imagen_principal = $request->imagen_principal;
            
            if ($request->hasFile('imagen_principal')) {
                $imagen = $request->file('imagen_principal');
                $nombreImagen = 'ruta' . $request->nombre . '_img.' . $imagen->getClientOriginalExtension();
                $rutaImagen = Storage::disk('public_assets')->putFileAs('uploads', $imagen, $nombreImagen);
                $imagen_principal =  $rutaImagen;
            } else if (!$imagen_principal) {
                if ($request->has('puntos') && !empty($request->puntos)) {
                    $primerPuntoInteresId = $request->puntos[0];
                    $primerPuntoInteres = PuntoInteres::find($primerPuntoInteresId);
                    $imagen_principal = $primerPuntoInteres->imagen;
                }
            }

            $rutaUpdate->update([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'fecha_creacion' => Carbon::now(),
                'duracion' => 4,
                'dificultad' => 'media',
                'imagen_principal' => $imagen_principal,
                'publica' => $request->publica,
                'id_usuario' =>  PersonalAccessToken::findToken($request->token)->tokenable_id
            ]);

            $rutaUpdate->puntos_interes()->detach();

            $rutaUpdate->puntos_interes()->attach(
                $request->puntos
            );

            return response()->json(['message' => 'Ruta actualizada correctamente', $rutaUpdate], 201);

            if ($validator->fails()) {
                return response()->json(['message' => 'La validación ha fallado', 'errors' => $validator->errors()], 400);
            }
        } catch (\Illuminate\Database\QueryException $exception) {
            return response()->json(['message' => 'Error al procesar la solicitud', $exception->getMessage()], 500);
        }
    }
}
