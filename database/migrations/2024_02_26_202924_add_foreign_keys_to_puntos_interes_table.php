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
        Schema::table('puntos_interes', function (Blueprint $table) {
            $table->foreign(['id_categoriaP'], 'fk_id_categoriaP')->references(['id_categoriaP'])->on('categorias_puntos')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('puntos_interes', function (Blueprint $table) {
            $table->dropForeign('fk_id_categoriaP');
        });
    }
};
