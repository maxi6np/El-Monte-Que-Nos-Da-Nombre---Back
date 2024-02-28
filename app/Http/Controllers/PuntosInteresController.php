<?php

namespace App\Http\Controllers;

use App\Models\PuntoInteres;
use Illuminate\Http\Request;

class PuntosInteresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mostrarMapa(Request $request)
    {
        $apiKey = '4531f429413fa5dfbd3768ec3040c187';
        $url_servicio = "https://api.openweathermap.org/data/2.5/weather?lat={$request->latitud}&lon={$request->longitud}&appid=$apiKey`";
        $curl = curl_init($url_servicio);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta_curl = curl_exec($curl);
        curl_close($curl);
        $datosTiempo = json_decode($respuesta_curl, true);

        // igual al data de un fetch
        return response()->json($datosTiempo);
    }

    public function getPuntos(){
        $puntosInteres = PuntoInteres::all();
        return response()->json($puntosInteres);
    }
}
