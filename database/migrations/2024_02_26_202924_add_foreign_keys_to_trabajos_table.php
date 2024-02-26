<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trabajos', function (Blueprint $table) {
            $table->foreign(['id_categoriaT'], 'fk_trabajos_id_categoriaT')->references(['id_categoriaT'])->on('categorias_trabajos')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['id_punto_interes'], 'fk_trabajos_id_punto_interes')->references(['id_punto_interes'])->on('puntos_interes')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trabajos', function (Blueprint $table) {
            $table->dropForeign('fk_trabajos_id_categoriaT');
            $table->dropForeign('fk_trabajos_id_punto_interes');
        });
    }
};
