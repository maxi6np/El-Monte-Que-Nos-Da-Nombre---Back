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
            'imagen' => 'https://www.abogadosoviedo.com/images/imagen_portada.png'
        ],
        [
            'latitud' => '43.378881617943435',
            'longitud' => '-5.867320687512581',
            'nombre' => 'Centro prerrománico',
            'descripcion' => 'Conjunto de edificaciones prerrománicas situadas en Oviedo, Patrimonio de la Humanidad.',
            'imagen' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/05/dd/0b/75/centro-de-recepcion-e.jpg?w=1200&h=-1&s=1'
        ],
        [
            'latitud' => '43.379253322668234',
            'longitud' => '-5.86595171634805',
            'nombre' => 'Santa María del Naranco',
            'descripcion' => 'Iglesia prerrománica situada en Oviedo, Asturias, considerada Patrimonio de la Humanidad.',
            'imagen' => 'https://www.turismoasturias.es/documents/39908/c483f7b1-fbf0-722c-7695-926a2ddc02b0?t=1674174799328'
        ],
        [
            'latitud' => '43.38050671663186',
            'longitud' => '-5.868392845183533',
            'nombre' => 'San Miguel de Lillo',
            'descripcion' => 'Iglesia prerrománica situada en Oviedo, Asturias, junto a Santa María del Naranco.',
            'imagen' => 'https://www.turismoasturias.es/documents/39908/02c712db-31cc-d0bd-1659-c068b071553d?t=1674174784971'
        ],
        [
            'latitud' => '43.38491032163024',
            'longitud' => '-5.863882858676761',
            'nombre' => 'Monumento al Sagrado Corazón',
            'descripcion' => 'Monumento situado en la cima del Monte Naranco, en Oviedo.',
            'imagen' => 'https://live.staticflickr.com/1607/24793829323_0a77848e57_b.jpg'
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
            'imagen' => 'https://live.staticflickr.com/5760/21497203395_63e7e59407_b.jpg'
        ],
        [
            'latitud' => '43.38204202353013',
            'longitud' => '-5.84529513169004',
            'nombre' => 'Fonte’sapu',
            'descripcion' => 'Fuente situada en el Monte Naranco, conocida por su fresca agua.',
            'imagen' => 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgCJP2V2KZw5CH_rm3LwyUo3ap8K0RvhWFY1EUzlbtxH5BzgZV6gaHbFaNMXXZ60uJBwWJP92Hg7XNofXTKne_0BIXOPrL2zfH4v0X4cJmsZwtrrc5r1GcvOLZdYW2w711nHxudThyphenhyphenQLlo/s675/fitoria-lavaderospublicos.net-01.jpg'
        ],
        [
            'latitud' => '43.38272025256119',
            'longitud' => '-5.8629702279787',
            'nombre' => 'Punto de revegetación',
            'descripcion' => 'Área de revegetación situada en el Monte Naranco.',
            'imagen' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/13/95/e6/28/monte-naranco.jpg?w=1200&h=-1&s=1'
        ],
        [
            'latitud' => '43.40364072519302',
            'longitud' => '-5.841202275880336',
            'nombre' => 'Cantera del Naranco',
            'descripcion' => 'Antigua cantera de extracción de piedra ubicada en el Monte Naranco.',
            'imagen' => 'https://www.asturiasmundial.com/noticias/fotos/60443_1_thumb.jpg'
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

        ],
        [
            'latitud' => '43.36821286087735',
            'longitud' => '-5.860387202855101',
            'nombre' => 'Calle Cuatro Ases de la canción asturiana',
            'descripcion' => 'Calle Cuatro Ases de la canción asturiana',
            'imagen' => ''

        ],
        [
            'latitud' => '43.36818075859578',
            'longitud' => '-5.857244862374825',
            'nombre' => 'Calle Naranjo de Bulnes',
            'descripcion' => 'Calle Naranjo de Bulnes',
            'imagen' => ''

        ],
        [
            'latitud' => '43.3686202625805',
            'longitud' => '-5.856973747032662',
            'nombre' => 'Calle Monte Gamonal',
            'descripcion' => 'Calle Monte Gamonal',
            'imagen' => ''

        ],
        [
            'latitud' => '43.36865595602057',
            'longitud' => '-5.854877147032674',
            'nombre' => 'Calle Monte Auseva',
            'descripcion' => 'Calle Monte Auseva',
            'imagen' => ''

        ],
        [
            'latitud' => '43.36917816092633',
            'longitud' => '-5.8567602605260785',
            'nombre' => 'Calle Montes del Sueve',
            'descripcion' => 'Calle Montes del Sueve',
            'imagen' => ''

        ],
        [
            'latitud' => '43.371041355652366',
            'longitud' => '-5.854304374019433',
            'nombre' => 'Calle Torrecerredo',
            'descripcion' => 'Calle Torrecerredo',
            'imagen' => ''

        ],
        [
            'latitud' => '43.368631058024164',
            'longitud' => '-5.8600254740195155',
            'nombre' => 'Calle Peña Ubiña',
            'descripcion' => 'Calle Peña Ubiña',
            'imagen' => ''

        ],
        [
            'latitud' => '43.365962267954366',
            'longitud' => '-5.8587129893617345',
            'nombre' => 'Calle Peña Santa de Enol',
            'descripcion' => 'Calle Peña Santa de Enol',
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
