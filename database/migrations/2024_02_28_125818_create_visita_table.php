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
        Schema::create('visita', function (Blueprint $table) {
            $table->bigInteger('id_usuario');
            $table->bigInteger('id_punto_interes')->index('fk_visita_id_punto_interes');
            $table->boolean('completado')->nullable();

            $table->primary(['id_usuario', 'id_punto_interes']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visita');
    }
};
