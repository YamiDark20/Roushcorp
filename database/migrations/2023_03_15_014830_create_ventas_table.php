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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('estado')->default("Sin Pagar");
            $table->decimal('vuelto', 9,2)->default(0);
            $table->decimal('cancelado', 9, 2)->default(0);
            $table->decimal('valor_compra', 9, 2)->default(0);
            $table->decimal('subtotal', 9, 2)->default(0);
            $table->decimal('iva', 9, 2)->default(0);
            $table->decimal('por_cancelar', 9, 2)->default(0);
            $table->foreignId('cliente_id')->constrained('customers')->nullable()->onDelete('cascade');
            $table->foreignId('vendedor_id')->constrained('users')->nullable()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
};
