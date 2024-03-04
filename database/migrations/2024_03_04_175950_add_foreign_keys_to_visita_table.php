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
        Schema::table('visita', function (Blueprint $table) {
            $table->foreign(['id_usuario'], 'visita_ibfk_1')->references(['id_usuario'])->on('usuarios')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['id_punto_interes'], 'visita_ibfk_2')->references(['id_punto_interes'])->on('puntos_interes')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visita', function (Blueprint $table) {
            $table->dropForeign('visita_ibfk_1');
            $table->dropForeign('visita_ibfk_2');
        });
    }
};
