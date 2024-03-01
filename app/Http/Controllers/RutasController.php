<?php

namespace App\Http\Controllers;

use App\Http\Resources\RutasCollection;
use App\Models\PuntoInteres;
use App\Models\Ruta;
use Illuminate\Http\Request;

class RutasController extends Controller
{
    public function getRutas(){
        $relaciones = ['puntos_interes'];
        $rutas = Ruta::with($relaciones);
        return new RutasCollection($rutas->get());
    }

    


}
