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
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->string('codfact')->unique();
            $table->string('estado')->default("Sin Pagar");
            $table->foreignId('venta_id')->constrained('ventas')->nullable()->onDelete('cascade');
            $table->foreignId('customer_id')->constrained('customers')->nullable()->onDelete('cascade');
            $table->string('tipo_pago');
            $table->decimal('cancelado', 9,2)->default(0);
            $table->decimal('por_cancelar', 9,2)->default(0);
            $table->decimal('vuelto', 9,2)->default(0);
            $table->decimal('total', 9,2);
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
        Schema::dropIfExists('documentos');
    }
};
