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
            $table->foreign(['id_ruta'], 'realiza_ibfk_1')->references(['id_ruta'])->on('rutas')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['id_usuario'], 'realiza_ibfk_2')->references(['id_usuario'])->on('usuarios')->onUpdate('CASCADE')->onDelete('CASCADE');
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
            $table->dropForeign('realiza_ibfk_1');
            $table->dropForeign('realiza_ibfk_2');
        });
    }
};
