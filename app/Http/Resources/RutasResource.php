<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RutasResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
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
            'puntos_interes' => PuntosResource::collection($this->whenLoaded('puntos_interes'))
        ];
    }
}
