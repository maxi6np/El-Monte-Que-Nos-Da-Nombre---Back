<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;

class Ruta extends Model
{
    use HasFactory;
    protected $table = 'rutas';
    protected $primaryKey= 'id_ruta';
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
        return $this->belongsToMany(PuntoInteres::class, 'formado', 'id_ruta', 'id_punto_interes',);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function realiza(){
        return $this->belongsToMany(User::class, 'realiza', 'id_ruta', 'id_usuario');
    }

    








}

