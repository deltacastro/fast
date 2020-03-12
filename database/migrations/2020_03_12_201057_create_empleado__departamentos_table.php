<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadoDepartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados_has_departamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('empleado_id');
            $table->unsignedBigInteger('departamento_id');
            $table->unsignedBigInteger('cargo_id');
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
        Schema::dropIfExists('empleado__departamentos');
    }
}
