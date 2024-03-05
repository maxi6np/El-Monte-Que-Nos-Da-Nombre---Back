<?php

namespace Database\Seeders;

use App\Models\PuntoInteres;
use App\Models\Ruta;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;

class RutasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $rutas = [
            [
                'nombre' => 'ruta1',
                'duracion' => '2',
                'dificultad' => 'baja',
                'fecha_creacion' => '2023/02/02',
                'imagen_principal' => 'https://upload.wikimedia.org/wikipedia/commons/0/0c/Cristo_del_Naranco.JPG',
                'descripcion' => 'ruta al cristo',
                'publica' => true,
                'id_usuario' => User::all()->random()->id_usuario
            ],
            [
                'nombre' => 'ruta2',
                'duracion' => 4,
                'dificultad' => 'alta',
                'fecha_creacion' => '2023/02/02',
                'imagen_principal' => 'https://upload.wikimedia.org/wikipedia/commons/0/0c/Cristo_del_Naranco.JPG',
                'descripcion' => 'ruta al cristo',
                'publica' => true,
                'id_usuario' => User::all()->random()->id_usuario
            ],
            [
                'nombre' => 'ruta3',
                'duracion' => '5',
                'dificultad' => 'media',
                'fecha_creacion' => '2023/02/02',
                'imagen_principal' => 'https://upload.wikimedia.org/wikipedia/commons/0/0c/Cristo_del_Naranco.JPG',
                'descripcion' => 'ruta al cristo',
                'publica' => false,
                'id_usuario' => User::all()->random()->id_usuario
            ]

        ];
        foreach ($rutas as $ruta) {
            $rutanueva = new Ruta();
            $rutanueva->nombre = $ruta['nombre'];
            $rutanueva->duracion = $ruta['duracion'];
            $rutanueva->dificultad = $ruta['dificultad'];
            $rutanueva->fecha_creacion = $ruta['fecha_creacion'];
            $rutanueva->imagen_principal = $ruta['imagen_principal'];
            $rutanueva->descripcion = $ruta['descripcion'];
            $rutanueva->publica = $ruta['publica'];
            $rutanueva->id_usuario = $ruta['id_usuario'];
            $rutanueva->save();
            $rutanueva->puntos_interes()->attach([
                PuntoInteres::all()->skip(0)->take(4)->random()->id_punto_interes,
                PuntoInteres::all()->skip(4)->take(4)->random()->id_punto_interes,
                PuntoInteres::all()->skip(8)->take(4)->random()->id_punto_interes,
                PuntoInteres::all()->skip(12)->take(4)->random()->id_punto_interes,
                PuntoInteres::all()->skip(16)->take(4)->random()->id_punto_interes,

            ]);
        }
    }
}
