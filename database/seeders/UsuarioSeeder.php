<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsuarioSeeder extends Seeder
{
    private $usuarios = [
        [
            'nombre_usuario' => 'maximo',
            'email' => 'maxinp@gmail.com',
            'password' => 1234,
            'nombre' => 'maximo',
            'apellidos' => 'novoa',
            'fecha_nacimiento' => '2001-11-10'
        ],
        [
            'nombre_usuario' => 'pablo',
            'email' => 'pablo@gmail.com',
            'password' => 1234,
            'nombre' => 'pablo',
            'apellidos' => 'fernandez',
            'fecha_nacimiento' => '2001-11-10'
        ],
        [
            'nombre_usuario' => 'yudith',
            'email' => 'yudith@gmail.com',
            'password' => 1234,
            'nombre' => 'yudith',
            'apellidos' => 'lorenzo',
            'fecha_nacimiento' => '2001-11-10'
        ]
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->usuarios as $usuario) {
            $nuevoUsuario = new User();
            $nuevoUsuario->nombre_usuario = $usuario['nombre_usuario'];
            $nuevoUsuario->email = $usuario['email'];
            $nuevoUsuario->password = bcrypt($usuario['password']);
            $nuevoUsuario->nombre = $usuario['nombre'];
            $nuevoUsuario->apellidos = $usuario['apellidos'];
            $nuevoUsuario->fecha_nacimiento = $usuario['fecha_nacimiento'];
            $nuevoUsuario->save();
        }

        $this->command->info('Tabla de usuarios inicializada con datos');

    }
}
