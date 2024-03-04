<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuntoInteres extends Model
{
    use HasFactory;
    protected $table = 'puntos_interes';
    protected $primaryKey = 'id_punto_interes';
    protected $fillable = [
        'latitud',
        'longitud',
        'nombre',
        'descripcion',
        'imagen'
    ];
    public $timestamps = false;

    public function trabajos(){
        return $this->hasMany(Trabajo::class, 'id_punto_interes');
    }


    public function rutas(){
        return $this->belongsToMany(Ruta::class, 'formado', 'id_punto_interes', 'id_ruta');
    }

    public function visitados(){
        return $this->belongsToMany(User::class, 'visita', 'id_punto_interes', 'id_usuario');
    }
}
