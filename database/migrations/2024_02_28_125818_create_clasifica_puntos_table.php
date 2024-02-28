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
        Schema::create('clasifica_puntos', function (Blueprint $table) {
            $table->bigInteger('id_punto_interes');
            $table->bigInteger('id_categoriaP')->index('fk_categoriaP_clasifica');

            $table->primary(['id_punto_interes', 'id_categoriaP']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clasifica_puntos');
    }
};
