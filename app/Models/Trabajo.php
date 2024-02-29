<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    use HasFactory;
    protected $table = 'trabajos';

    public function punto(){
        return $this->BelongsTo(PuntoInteres::class);
    }

}
