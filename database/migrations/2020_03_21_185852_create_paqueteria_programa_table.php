<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaqueteriaProgramaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paqueteria_programa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('paqueteria_id');
            $table->unsignedBigInteger('programa_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paqueteria_programa');
    }
}
