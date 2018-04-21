<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturaVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura_ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cliente');
            $table->decimal('monto_factura', 10, 2);
            $table->decimal('monto_descuento', 10, 2);
            $table->decimal('monto_impuesto', 10, 2);
            $table->decimal('monto_total', 10, 2);
            $table->enum('facturacion', ['credito', 'contado']);
            $table->unsignedInteger('usuario');
            $table->timestamps();

            $table->foreign('cliente')->references('id')->on('clientes');
            $table->foreign('usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura_ventas');
    }
}
