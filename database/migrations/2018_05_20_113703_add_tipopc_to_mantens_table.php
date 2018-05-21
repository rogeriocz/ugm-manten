<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTipopcToMantensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mantens', function (Blueprint $table) {
            $table->unsignedInteger('pc_id')->nullable()->after('fecha_manten');
            $table->foreign('pc_id')->references('id')->on('mantens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mantens', function (Blueprint $table) {
            //
        });
    }
}
