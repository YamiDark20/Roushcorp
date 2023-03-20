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
            $table->decimal('vuelto', 9,2)->default(0);
            $table->string('tipo_documento');
            $table->string('tipo_pago');
            $table->decimal('cancelado', 9, 2)->default(0);
            $table->decimal('valor_compra', 9, 2)->default(0);
            $table->decimal('por_cancelar', 9, 2)->default(0);
            $table->foreignId('cliente_id')->constrained('customers')->nullable()->onDelete('cascade');
            $table->foreignId('almacen_id')->constrained('almacenes')->nullable()->onDelete('cascade');
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
