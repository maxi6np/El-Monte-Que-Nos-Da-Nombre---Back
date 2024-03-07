<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoriaTrabajo;
use App\Models\Trabajo;

class CategoriasTrabajosSeeder extends Seeder
{
    private $categoriasTrabajos = [
        [
            'nombre' => '1º ESO',
            'descripcion' => 'Biología'
        ],
        [
            'nombre' => '1º ESO',
            'descripcion' => 'Física y Química'
        ],
        [
            'nombre' => '1º ESO',
            'descripcion' => 'Geografía e Historia'
        ],
        [
            'nombre' => '1º ESO',
            'descripcion' => 'Cultura clásica'
        ],
        [
            'nombre' => '2º ESO',
            'descripcion' => 'Lengua'
        ],
        [
            'nombre' => '2º ESO',
            'descripcion' => 'Matemáticas'
        ],
        [
            'nombre' => '2º ESO',
            'descripcion' => 'Biología'
        ],
        [
            'nombre' => '2º ESO',
            'descripcion' => 'Dibujo'
        ],
        [
            'nombre' => '3º ESO',
            'descripcion' => 'Cultura clásica'
        ],
        [
            'nombre' => '3º ESO',
            'descripcion' => 'Inglés'
        ],
        [
            'nombre' => '3º ESO',
            'descripcion' => 'Física y Química'
        ],
        [
            'nombre' => '3º ESO',
            'descripcion' => 'Francés'
        ],
        [
            'nombre' => '4º ESO',
            'descripcion' => 'Biología',
        ],
        [
            'nombre' => '4º ESO',
            'descripcion' => 'Lengua',
        ],
        [
            'nombre' => '4º ESO',
            'descripcion' => 'Geografía e Historia',
        ],
        [
            'nombre' => '4º ESO',
            'descripcion' => 'Francés',
        ],
        [
            'nombre' => '1º BACH',
            'descripcion' => 'Física y Química',
        ],
        [
            'nombre' => '1º BACH',
            'descripcion' => 'Biología',
        ],
        [
            'nombre' => '1º BACH',
            'descripcion' => 'Inglés',
        ],
        [
            'nombre' => '1º BACH',
            'descripcion' => 'Cultura clásica',
        ],
        [
            'nombre' => '2º BACH',
            'descripcion' => 'Biología',
        ],
        [
            'nombre' => '2º BACH',
            'descripcion' => 'Matemáticas',
        ],
        [
            'nombre' => '2º BACH',
            'descripcion' => 'Lengua',
        ],
        [
            'nombre' => '2º BACH',
            'descripcion' => 'Geografía e Historia',
        ],
    ];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach ($this->categoriasTrabajos as $categoria) {
            $catTrabajo = new CategoriaTrabajo();
            $catTrabajo->nombre = $categoria['nombre'];
            $catTrabajo->descripcion = $categoria['descripcion'];
            $catTrabajo->save();
            $catTrabajo->trabajos()->attach([
                Trabajo::all()->skip(0)->take(5)->random()->id_trabajo,
            ]);
        }
        $this->command->info('Tabla de categorías trabajos inicializada con datos');
    }
}
