<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('departamento');
            $table->boolean('iv');
            $table->unsignedInteger('proveedor1');
            $table->unsignedInteger('proveedor2');
            $table->decimal('precio_costo', 10, 2);
            $table->decimal('precio_publico', 10, 2);
            $table->integer('existencia');
            
            $table->timestamps();

            $table->foreign('proveedor1')->references('id')->on('proveedors');
            $table->foreign('proveedor2')->references('id')->on('proveedors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
