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
        Schema::create('realiza', function (Blueprint $table) {
            $table->bigInteger('id_ruta');
            $table->bigInteger('id_usuario')->index('fk_realiza_id_usuario');

            $table->primary(['id_ruta', 'id_usuario']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realiza');
    }
};
