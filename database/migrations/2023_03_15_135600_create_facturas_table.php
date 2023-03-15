<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_factura');
            $table->string('nombre_producto', 45);
            $table->string('marca_producto', 45);
            $table->decimal('peso_producto', 9, 2);
            $table->integer('cantidad_producto');
            $table->decimal('precio_producto', 9,2);
            $table->boolean('exonerado');
            $table->string('nombre_cliente', 45);
            $table->string('rif_cliente', 11)->unique();
            $table->string('direccion_cliente', 70);
            $table->string('telefono_cliente', 11);
            $table->string('nombre_almacen', 45);
            $table->decimal('precio_antes_de_impuesto', 9,2);
            $table->decimal('precio_total_factura', 9,2);
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
        Schema::dropIfExists('facturas');
    }
};
