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
            $table->decimal('iva_producto', 9,2);
            $table->decimal('precio_producto', 9,2);
            $table->decimal('total_producto', 9,2);
            $table->foreignId('almacen_id')->constrained('almacenes')->nullable()->onDelete('cascade');
            $table->foreignId('producto_id')->constrained('productos')->nullable()->onDelete('cascade');
            $table->foreignId('venta_id')->constrained('ventas')->nullable()->onDelete('cascade');
            $table->integer('cantidad_producto')->default(0);
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
