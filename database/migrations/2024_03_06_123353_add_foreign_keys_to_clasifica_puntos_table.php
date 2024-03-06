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
        Schema::table('clasifica_puntos', function (Blueprint $table) {
            $table->foreign(['id_categoriaP'], 'fk_categoriaP_clasifica')->references(['id_categoriaP'])->on('categorias_puntos')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['id_punto_interes'], 'fk_id_punto_clasifica')->references(['id_punto_interes'])->on('puntos_interes')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clasifica_puntos', function (Blueprint $table) {
            $table->dropForeign('fk_categoriaP_clasifica');
            $table->dropForeign('fk_id_punto_clasifica');
        });
    }
};
