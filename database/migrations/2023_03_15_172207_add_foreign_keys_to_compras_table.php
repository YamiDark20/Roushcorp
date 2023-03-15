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
        Schema::table('compras', function (Blueprint $table) {
            $table->foreignId('cliente_id')->constrained('clientes')->nullable()->onDelete('cascade');
            $table->foreignId('almacen_id')->constrained('almacens')->nullable()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('compras', function (Blueprint $table) {
            $table->dropForeign('compras_cliente_id_foreign');
            $table->dropForeign('compras_almacen_id_foreign');
        });
    }
};
