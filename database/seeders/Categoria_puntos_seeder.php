<?php

namespace Database\Seeders;

use App\Models\CategoriaP;
use App\Models\PuntoInteres;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Categoria_puntos_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $categoriasP = [
        [
            'nombre' => 'accesible'
        ],
        [
            'nombre' => 'cerrada'
        ],
        [
            'nombre' => 'leyenda'
        ],
        [
            'nombre' => 'historia'
        ]
    ];
    public function run()
    {
        foreach($this->categoriasP as $categoria){
            $categoriaP = new CategoriaP();
            $categoriaP->nombre = $categoria['nombre'];
            $categoriaP ->save();
            $categoriaP->puntos()->attach([
                PuntoInteres::all()->skip(0)->take(4)->random()->id_punto_interes,
                PuntoInteres::all()->skip(4)->take(4)->random()->id_punto_interes,
                PuntoInteres::all()->skip(8)->take(4)->random()->id_punto_interes
            ]);

        }   
    }
}
