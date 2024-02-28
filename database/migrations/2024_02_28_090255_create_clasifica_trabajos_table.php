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
        Schema::create('clasifica_trabajos', function (Blueprint $table) {
            $table->bigInteger('id_trabajo');
            $table->bigInteger('id_categoriaT')->index('fk_id_categoriaT_clasifica');

            $table->primary(['id_trabajo', 'id_categoriaT']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clasifica_trabajos');
    }
};
