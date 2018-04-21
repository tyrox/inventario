<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('fact_compra');
            $table->unsignedInteger('producto');
            $table->decimal('precio_costo', 10, 2);
            $table->decimal('precio_venta', 10, 2);
            $table->integer('cantidad_compra');
            $table->decimal('impuesto', 10, 2);
            $table->timestamps();

            $table->foreign('fact_compra')->references('id')->on('factura_compras');
            $table->foreign('producto')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_compras');
    }
}
