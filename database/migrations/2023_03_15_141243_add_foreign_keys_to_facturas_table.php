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
        Schema::table('facturas', function (Blueprint $table) {
            $table->foreignId('venta_id')->constrained('ventas')->nullable()->onDelete('cascade');
            $table->foreignId('compra_id')->constrained('compras')->nullable()->onDelete('cascade');
            //$table->foreignId('cliente_id')->constrained('clientes')->nullable()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('facturas', function (Blueprint $table) {
            $table->dropForeign('facturas_venta_id_foreign');
            $table->dropForeign('facturas_compra_id_foreign');
            //$table->dropForeign('facturas_cliente_id_foreign');
        });
    }
};
