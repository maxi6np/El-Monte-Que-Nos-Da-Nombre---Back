<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    use HasFactory;
    protected $table = 'visita';
    protected $primaryKey= ['id_punto_interes', 'id_usuario'];
    protected $fillable = [
        'completado'
    ];


}
