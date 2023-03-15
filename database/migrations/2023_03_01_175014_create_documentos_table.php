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
            
            //$table->string('impuesto');
            $table->string('numguia');
            $table->string('moneda');
            $table->string('estado');
            $table->date('fecha');
            $table->string('tipocambio');
            //$table->string('impuesto');
            $table->decimal('impuesto', 9,2);
            $table->decimal('subtotal', 9,2);
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
