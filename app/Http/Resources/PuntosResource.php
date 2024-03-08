<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PuntosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    protected $visitado = false;
    public function setVisitado($valor){
        $this->visitado = $valor;
        return $this;
    }
    public function toArray($request)
    {
        return[
            'id_punto_interes' => $this->id_punto_interes,
            'latitud'=> $this->latitud,
            'longitud'=>$this->longitud,
            'nombre'=>$this->nombre,
            'descripcion'=>$this->descripcion,
            'imagen' => $this->imagen,
            'trabajos' => TrabajosResource::collection($this->whenLoaded('trabajos')),
            'categoriasPuntos' => CategoriasPResource::collection($this->whenLoaded('categoriasPuntos')),
            'visitados' => UserResource::collection($this->whenLoaded('visitados'))

        ];
    }
}
