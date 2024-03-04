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
        Schema::table('formado', function (Blueprint $table) {
            $table->foreign(['id_ruta'], 'formado_ibfk_1')->references(['id_ruta'])->on('rutas')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['id_punto_interes'], 'formado_ibfk_2')->references(['id_punto_interes'])->on('puntos_interes')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('formado', function (Blueprint $table) {
            $table->dropForeign('formado_ibfk_1');
            $table->dropForeign('formado_ibfk_2');
        });
    }
};
