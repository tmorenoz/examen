<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ape_paterno');
            $table->string('ape_materno');
            $table->string('dni');
            $table->string('direccion');
            $table->string('telefono');
            $table->bigInteger('empresa_id')->references('id')->on('empresas');
            $table->string('foto');
            $table->string('cargo');
            $table->string('salario');
            $table->string('password');
            $table->string('email');
            $table->bigInteger('categoria_id')->references('id')->on('categorias');
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
        Schema::dropIfExists('usuarios');
    }
}
