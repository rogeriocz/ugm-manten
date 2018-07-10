<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMantensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('t_equipo')->nullable();
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('n_serie')->nullable();
            $table->boolean('compañia')->default(0);
            $table->boolean('placa')->default(0);
            $table->boolean('laboratorio')->default(0);
            $table->datetime('fecha_manten')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mantens');
    }
}
