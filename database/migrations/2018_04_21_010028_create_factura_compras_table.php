<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturaComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura_compras', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('proveedor_id');
            $table->decimal('monto_factura', 10, 2);
            $table->decimal('monto_descuento', 10, 2);
            $table->decimal('monto_impuesto', 10, 2);
            $table->decimal('monto_total', 10, 2);
            $table->enum('facturacion', ['credito', 'contado']);
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->foreign('proveedor_id')->references('id')->on('proveedors');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura_compras');
    }
}
