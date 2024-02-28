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
        Schema::create('rutas', function (Blueprint $table) {
            $table->bigInteger('id_ruta', true);
            $table->string('nombre', 100)->nullable();
            $table->integer('duracion')->nullable();
            $table->enum('dificultad', ['baja', 'media', 'alta'])->nullable();
            $table->dateTime('fecha_creacion')->nullable();
            $table->string('imagen_principal')->nullable();
            $table->text('descripcion')->nullable();
            $table->bigInteger('id_usuario')->nullable()->index('fk_id_usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rutas');
    }
};
