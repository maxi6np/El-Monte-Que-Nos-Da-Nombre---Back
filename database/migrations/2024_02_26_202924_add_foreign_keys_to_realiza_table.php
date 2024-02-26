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
        Schema::table('realiza', function (Blueprint $table) {
            $table->foreign(['id_ruta'], 'fk_realiza_id_ruta')->references(['id_ruta'])->on('rutas')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['id_usuario'], 'fk_realiza_id_usuario')->references(['id_usuario'])->on('usuarios')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('realiza', function (Blueprint $table) {
            $table->dropForeign('fk_realiza_id_ruta');
            $table->dropForeign('fk_realiza_id_usuario');
        });
    }
};
