<?php

namespace App\Http\Resources;

use App\Models\Ruta;
use Illuminate\Http\Resources\Json\JsonResource;

class RutasResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

     protected $porcentaje;
     protected $puntos_interes= 'vacio';
        public function porcentaje($valor){
            $this->porcentaje = $valor;
            return $this;
        }

      
        public function cargarVisitados(Ruta $ruta, $userID = 0){
            $puntosVisitados = [];
            foreach($ruta->puntos_interes as $punto_interes){
                foreach($punto_interes->visitados as $visita){
                    $punto = new PuntosResource($punto_interes);
                    if($visita->id_usuario == $userID && $visita->visita->completado == true){
                        
                        $punto->setVisitado(true);
                    }
                    array_push($puntosVisitados, $punto);
            }
        }
        $this->puntos_interes = $puntosVisitados;
    }
    public function toArray($request)
    {
        return[
            'id_ruta' => $this->id_ruta,
            'nombre' => $this->nombre,
            'duracion' => $this->duracion,
            'dificultad' => $this->dificultad,
            'fecha_creacion'=>$this->fecha_creacion,
            'imagen_principal' => $this->imagen_principal,
            'descripcion'=> $this->descripcion,
            'publica' => $this->publica,
            'id_usuario'=> $this-> id_usuario,
            'porcentaje'=> $this->porcentaje,
            'puntos_interes' => $this->puntos_interes == 'vacio' ?  PuntosResource::collection($this->whenLoaded('puntos_interes')) : PuntosResource::collection(($this->puntos_interes))
        ];
    }
}
