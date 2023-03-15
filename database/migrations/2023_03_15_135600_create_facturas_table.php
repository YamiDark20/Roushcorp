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
            $table->boolean('exonerado');
            $table->decimal('precio_antes_de_impuesto', 9,2);
            $table->decimal('precio_total_factura', 9,2);
            $table->foreignId('producto_id')->constrained('productos')->nullable()->onDelete('cascade');
            $table->foreignId('venta_id')->constrained('ventas')->nullable()->onDelete('cascade');
            $table->foreignId('compra_id')->constrained('compras')->nullable()->onDelete('cascade');
            $table->foreignId('almacen_id')->constrained('almacenes')->nullable()->onDelete('cascade');
            $table->foreignId('cliente_id')->constrained('cliente')->nullable()->onDelete('cascade');
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
