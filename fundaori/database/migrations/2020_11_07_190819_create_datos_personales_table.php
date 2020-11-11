<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosPersonalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_personales', function (Blueprint $table) {
            $table->id();
            $table->string('cedulaReligioso');
            $table->string('nombresReligioso');
            $table->string('apellidosReligioso');
            $table->date('fechaNaciReligioso');
            $table->string('lugarNacimiento');
            $table->text('direccion');
            $table->string('nivelEducaReligioso');
            $table->string('profesionOficioReligioso');
            $table->integer('nacionalidad_id');
            $table->integer('genero_id');
            $table->integer('estadoCivil_id');
            $table->string('email');
            $table->string('oficio');
            $table->string('discapacidad');
            $table->string('estado');
            $table->string('tlocal');
            $table->string('tmovil');
            $table->softDeletes();
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
        Schema::dropIfExists('datos_personales');
    }
}
