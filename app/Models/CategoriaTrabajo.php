<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaTrabajo extends Model
{
    use HasFactory;
    protected $table = 'categorias_trabajos';
    protected $primaryKey = 'id_categoriaT';
    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    public $timestamps = false;

    public function trabajos()
    {
        return $this->belongsToMany(Trabajo::class, 'clasifica_trabajos', 'id_categoriaT', 'id_trabajo');
    }
}
