<?php

namespace Database\Seeders;

use App\Models\PuntoInteres;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PuntoInteresSeeder extends Seeder
{
    private $puntosInteres = [
        [
            'latitud' => '43.3639',
            'longitud' => '-5.8508',
            'nombre' => 'IES Monte Naranco',
            'descripcion' => 'Instituto de Educación Secundaria ubicado en Oviedo, Asturias.',
            'id_categoriaP' => '1'
        ],
        [
            'latitud' => '43.3591',
            'longitud' => '-5.8429',
            'nombre' => 'Centro prerrománico',
            'descripcion' => 'Conjunto de edificaciones prerrománicas situadas en Oviedo, Patrimonio de la Humanidad.',
            'id_categoriaP' => '1'
        ],
        [
            'latitud' => '43.3624',
            'longitud' => '-5.8543',
            'nombre' => 'Santa María del Naranco',
            'descripcion' => 'Iglesia prerrománica situada en Oviedo, Asturias, considerada Patrimonio de la Humanidad.',
            'id_categoriaP' => '1'
        ],
        [
            'latitud' => '43.3629',
            'longitud' => '-5.8485',
            'nombre' => 'San Miguel de Lillo',
            'descripcion' => 'Iglesia prerrománica situada en Oviedo, Asturias, junto a Santa María del Naranco.',
            'id_categoriaP' => '1'
        ],
        [
            'latitud' => '43.3655',
            'longitud' => '-5.8589',
            'nombre' => 'Monumento al Sagrado Corazón',
            'descripcion' => 'Monumento situado en la cima del Monte Naranco, en Oviedo.',
            'id_categoriaP' => '1'
        ],
        [
            'latitud' => '43.3703',
            'longitud' => '-5.8504',
            'nombre' => 'Fuente de los Pastores',
            'descripcion' => 'Fuente situada en el Monte Naranco, conocida por su fresca agua.',
            'id_categoriaP' => '1'
        ],
        [
            'latitud' => '43.3648',
            'longitud' => '-5.8518',
            'nombre' => 'Fuente Prados de la Fuente',
            'descripcion' => 'Fuente ubicada en los Prados de la Fuente, en Oviedo.',
            'id_categoriaP' => '1'
        ],
        [
            'latitud' => '43.3631',
            'longitud' => '-5.8407',
            'nombre' => 'Fonte’sapu',
            'descripcion' => 'Fuente situada en el Monte Naranco, conocida por su fresca agua.',
            'id_categoriaP' => '1'
        ],
        [
            'latitud' => '43.3669',
            'longitud' => '-5.8495',
            'nombre' => 'Punto de revegetación',
            'descripcion' => 'Área de revegetación situada en el Monte Naranco.',
            'id_categoriaP' => '1'
        ],
        [
            'latitud' => '43.3621',
            'longitud' => '-5.8565',
            'nombre' => 'Cantera del Naranco',
            'descripcion' => 'Antigua cantera de extracción de piedra ubicada en el Monte Naranco.',
            'id_categoriaP' => '1'
        ],
        [
            'latitud' => '43.3593',
            'longitud' => '-5.8624',
            'nombre' => 'Mina Pastora y Mina Gorgota',
            'descripcion' => 'Antiguas minas de extracción de carbón ubicadas en el Monte Naranco.',
            'id_categoriaP' => '1'
        ],
        [
            'latitud' => '43.3618',
            'longitud' => '-5.8593',
            'nombre' => 'Los caleros del Naranco',
            'descripcion' => 'Antiguos hornos de cal ubicados en el Monte Naranco.',
            'id_categoriaP' => '1'
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
            $ptoInteres->nombre = bcrypt($punto['nombre']);
            $ptoInteres->descripcion = $punto['descripcion'];
            $ptoInteres->id_categoriaP = $punto['id_categoriaP'];
            $ptoInteres->save();
        }
        $this->command->info('Tabla de puntos de interés inicializada con datos');
    }
}
