<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    use HasFactory;
    protected $table = 'trabajos';
    protected $fillable = [
        'nombre',
        'texto',
        'URL',
        'tipo',
        'idioma',
        'movil',
        'id_punto_interes'
    ];
    public $timestamps = false;

    public function punto(){
        return $this->BelongsTo(PuntoInteres::class);
    }

}
