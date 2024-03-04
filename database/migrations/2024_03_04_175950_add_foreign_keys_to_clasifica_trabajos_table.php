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
        Schema::table('clasifica_trabajos', function (Blueprint $table) {
            $table->foreign(['id_categoriaT'], 'fk_id_categoriaT_clasifica')->references(['id_categoriaT'])->on('categorias_trabajos')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['id_trabajo'], 'fk_id_trabajo_clasifica')->references(['id_trabajo'])->on('trabajos')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clasifica_trabajos', function (Blueprint $table) {
            $table->dropForeign('fk_id_categoriaT_clasifica');
            $table->dropForeign('fk_id_trabajo_clasifica');
        });
    }
};
