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
        Schema::create('almacen_productos', function (Blueprint $table) {
            $table->id();
            $table->string('estado', 25);
            $table->string('stock', 45);
            $table->integer('cantidad_a_reponer');
            $table->foreignId('producto_id')->constrained('productos')->nullable()->onDelete('cascade');
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
        Schema::dropIfExists('almacen_productos');
    }
};
