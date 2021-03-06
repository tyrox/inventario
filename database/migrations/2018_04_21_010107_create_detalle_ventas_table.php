<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('factura_venta_id');
            $table->unsignedInteger('producto_id');
            $table->decimal('precio_costo', 10, 2);
            $table->decimal('precio_venta', 10, 2);
            $table->integer('cantidad_venta');
            $table->decimal('impuesto_venta', 10, 2);
            $table->timestamps();

            $table->foreign('factura_venta_id')->references('id')->on('factura_ventas');
            $table->foreign('producto_id')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_ventas');
    }
}
