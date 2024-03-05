<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaP extends Model
{
    use HasFactory;
    protected $table = 'categorias_puntos';
    protected $primaryKey = 'id_categoriaP';
    protected $fillable = [
        'nombre'
    ];
    public $timestamps = false;
   

    public function puntos(){
        return $this-> belongsToMany(PuntoInteres::class, 'clasifica_puntos', 'id_categoriaP', 'id_punto_interes');
    }
}
