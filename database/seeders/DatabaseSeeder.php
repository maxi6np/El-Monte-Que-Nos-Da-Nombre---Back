<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\PuntoInteres;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('usuarios')->delete();
        $this->call(UsuarioSeeder::class);

        DB::table('puntos_interes')->delete();
        $this->call(PuntoInteresSeeder::class);

        DB::table('trabajos')->delete();
        $this->call(TrabajosSeeder::class);

        DB::table('rutas')->delete();
        $this->call(RutasSeeder::class);

        DB::table('categorias_puntos')->delete();
        $this->call(Categoria_puntos_seeder::class);

        DB::table('categorias_trabajos')->delete();
        $this->call(CategoriasTrabajosSeeder::class);
    }
}
