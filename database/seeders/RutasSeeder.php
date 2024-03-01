<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RutasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     private $rutas = [
        [
            'nombre' => 'ruta1',
            'duracion' => 2,
            'dificultad' => 'baja',
            'fecha_creacion' => '2023/02/02',
            'imagen_principal' => 'https://upload.wikimedia.org/wikipedia/commons/0/0c/Cristo_del_Naranco.JPG',
            'descripcion' => 'ruta al cristo',
            'publica' => true,
            'id_usuario' => 1
        ],
        [
            'nombre' => 'ruta2',
            'duracion' => 4,
            'dificultad' => 'alta',
            'fecha_creacion' => '2023/02/02',
            'imagen_principal' => 'https://upload.wikimedia.org/wikipedia/commons/0/0c/Cristo_del_Naranco.JPG',
            'descripcion' => 'ruta al cristo',
            'publica' => true,
            'id_usuario' => 2
        ],
        [
            'nombre' => 'ruta1',
            'duracion' => 5,
            'dificultad' => 'media',
            'fecha_creacion' => '2023/02/02',
            'imagen_principal' => 'https://upload.wikimedia.org/wikipedia/commons/0/0c/Cristo_del_Naranco.JPG',
            'descripcion' => 'ruta al cristo',
            'publica' => false,
            'id_usuario' => 3
        ]

        ];
    public function run()
    {
        
    }
}
