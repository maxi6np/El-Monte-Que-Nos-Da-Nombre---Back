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
    public function toArray($request)
    {
        return[
            'latitud'=> $this->latidud,
            'longitud'=>$this->longitud,
            'nombre'=>$this->nombre,
            'descripcion'=>$this->descripcion,
            'id_categoriaP'=>$this->id_categoriaP
        ];
    }
}
