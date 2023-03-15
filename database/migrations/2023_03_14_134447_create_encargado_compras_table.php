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
        Schema::create('encargado_compras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
            $table->foreignId('user_id')->constrained('users')->nullable()->onDelete('cascade');
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
        Schema::dropIfExists('encargado_compras');
    }
};
