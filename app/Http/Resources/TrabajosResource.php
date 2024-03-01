<?php

namespace App\Http\Resources;
use Illuminate\Http\Request;

use Illuminate\Http\Resources\Json\JsonResource;

class TrabajosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'nombre' => $this->nombre,
            'texto' => $this->texto,
            'URL' => $this->URL,
            'tipo' => $this->tipo,
            'idioma' => $this->idioma,
            'movil' => $this->movil
        ];
    }
}
