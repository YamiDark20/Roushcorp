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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->decimal('valor_compra', 9,2);
            $table->decimal('cancelado', 9,2);
            $table->decimal('por_cancelar', 9,2);
            $table->decimal('vuelto', 9,2);
            $table->string('tipo_pago');
            $table->foreignId('cliente_id')->constrained('clientes')->nullable()->onDelete('cascade');
            $table->foreignId('almacen_id')->constrained('almacenes')->nullable()->onDelete('cascade');
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
        Schema::dropIfExists('compras');
    }
};
