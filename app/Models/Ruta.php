<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ruta extends Model
{
    use HasFactory;
    protected $table = 'rutas';
    protected $fillable = [
        'nombre',
        'duracion',
        'dificultad',
        'fecha_creacion',
        'imagen_principal',
        'descripcion',
        'publica',
        'id_usuario'
    ];
    public $timestamps = false;
    public function puntos_interes(){
        return $this->BelongsToMany(PuntoInteres::class);
    }



}

