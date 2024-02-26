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
        Schema::create('puntos_interes', function (Blueprint $table) {
            $table->bigInteger('id_punto_interes', true);
            $table->double('latitud');
            $table->double('longitud');
            $table->string('nombre', 100)->nullable();
            $table->text('descripcion')->nullable();
            $table->bigInteger('id_categoriaP')->nullable()->index('fk_id_categoriaP');

            $table->unique(['latitud', 'longitud'], 'coordenadas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puntos_interes');
    }
};
