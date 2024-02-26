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
        Schema::create('trabajos', function (Blueprint $table) {
            $table->bigInteger('id_trabajo', true);
            $table->string('nombre', 45)->nullable();
            $table->text('texto')->nullable();
            $table->string('URL')->nullable();
            $table->enum('tipo', ['imagen', 'video', 'texto', 'audio'])->nullable();
            $table->string('idioma', 50)->nullable();
            $table->boolean('movil')->nullable();
            $table->bigInteger('id_punto_interes')->nullable()->index('fk_trabajos_id_punto_interes');
            $table->bigInteger('id_categoriaT')->nullable()->index('fk_trabajos_id_categoriaT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabajos');
    }
};
