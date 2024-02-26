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
        Schema::create('formado', function (Blueprint $table) {
            $table->bigInteger('id_ruta');
            $table->bigInteger('id_punto_interes')->index('fk_formado_id_punto_interes');

            $table->primary(['id_ruta', 'id_punto_interes']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formado');
    }
};
