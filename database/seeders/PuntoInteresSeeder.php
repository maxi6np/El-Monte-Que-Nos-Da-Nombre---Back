<?php

namespace Database\Seeders;

use App\Models\PuntoInteres;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PuntoInteresSeeder extends Seeder
{
    private $puntosInteres = [
        [
            'latitud' => '43.37417523698898',
            'longitud' => '-5.860529475867997',
            'nombre' => 'IES Monte Naranco',
            'descripcion' => 'Instituto de Educación Secundaria ubicado en Oviedo, Asturias.',
            'imagen' => ''
        ],
        [
            'latitud' => '43.378881617943435',
            'longitud' => '-5.867320687512581',
            'nombre' => 'Centro prerrománico',
            'descripcion' => 'Conjunto de edificaciones prerrománicas situadas en Oviedo, Patrimonio de la Humanidad.',
            'imagen' => ''
        ],
        [
            'latitud' => '43.379253322668234',
            'longitud' => '-5.86595171634805',
            'nombre' => 'Santa María del Naranco',
            'descripcion' => 'Iglesia prerrománica situada en Oviedo, Asturias, considerada Patrimonio de la Humanidad.',
            'imagen' => ''
        ],
        [
            'latitud' => '43.38050671663186',
            'longitud' => '-5.868392845183533',
            'nombre' => 'San Miguel de Lillo',
            'descripcion' => 'Iglesia prerrománica situada en Oviedo, Asturias, junto a Santa María del Naranco.',
            'imagen' => ''
        ],
        [
            'latitud' => '43.38491032163024',
            'longitud' => '-5.863882858676761',
            'nombre' => 'Monumento al Sagrado Corazón',
            'descripcion' => 'Monumento situado en la cima del Monte Naranco, en Oviedo.',
            'imagen' => ''
        ],
        [
            'latitud' => '43.383037418472625',
            'longitud' => '-5.868806131690014',
            'nombre' => 'Fuente de los Pastores',
            'descripcion' => 'Fuente situada en el Monte Naranco, conocida por su fresca agua.',
            'imagen' => ''
        ],
        [
            'latitud' => '43.37741766367562',
            'longitud' => '-5.8584234862548845',
            'nombre' => 'Fuente Prados de la Fuente',
            'descripcion' => 'Fuente ubicada en los Prados de la Fuente, en Oviedo.',
            'imagen' => ''
        ],
        [
            'latitud' => '43.38204202353013',
            'longitud' => '-5.84529513169004',
            'nombre' => 'Fonte’sapu',
            'descripcion' => 'Fuente situada en el Monte Naranco, conocida por su fresca agua.',
            'imagen' => ''
        ],
        [
            'latitud' => '43.38272025256119',
            'longitud' => '-5.8629702279787',
            'nombre' => 'Punto de revegetación',
            'descripcion' => 'Área de revegetación situada en el Monte Naranco.',
            'imagen' => ''
        ],
        [
            'latitud' => '43.40364072519302',
            'longitud' => '-5.841202275880336',
            'nombre' => 'Cantera del Naranco',
            'descripcion' => 'Antigua cantera de extracción de piedra ubicada en el Monte Naranco.',
            'imagen' => ''
        ],
        [
            'latitud' => '43.384459994566015',
            'longitud' => '-5.882923362939819',
            'nombre' => 'Mina Pastora y Mina Gorgota',
            'descripcion' => 'Antiguas minas de extracción de carbón ubicadas en el Monte Naranco.',
            'imagen' => ''
        ],
        [
            'latitud' => '43.566534993114786',
            'longitud' => '-5.818245441487321',
            'nombre' => 'Los caleros del Naranco',
            'descripcion' => 'Antiguos hornos de cal ubicados en el Monte Naranco.',
            'imagen' => ''

        ]
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->puntosInteres as $punto) {
            $ptoInteres = new PuntoInteres();
            $ptoInteres->latitud = $punto['latitud'];
            $ptoInteres->longitud = $punto['longitud'];
            $ptoInteres->nombre = $punto['nombre'];
            $ptoInteres->descripcion = $punto['descripcion'];
            $ptoInteres->save();
        }
        $this->command->info('Tabla de puntos de interés inicializada con datos');
    }
}
