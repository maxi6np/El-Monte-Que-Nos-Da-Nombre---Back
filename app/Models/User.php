<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table='usuarios';
    public $timestamps = false;
    protected $primaryKey ='id_usuario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre_usuario',
        'email',
        'password',
        'nombre',
        'apellidos',
        'fecha_nacimiento'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rutas(){
        return $this->hasMany(Ruta::class);
    }
    public function visitados(){
        return $this->belongsToMany(User::class, 'visita', 'id_usuario', 'id_punto_interes')->as('visita')->withPivot('completado');
    }

    public function realiza(){
        return $this->belongsToMany(Ruta::class, 'visita', 'id_usuario', 'id_ruta');
    }

}
