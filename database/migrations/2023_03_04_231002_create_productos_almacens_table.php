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
        Schema::create('productos_almacens', function (Blueprint $table) {
            $table->id();
            $table->string('idprod');
            $table->foreign('idprod')
                ->references('codigo')
                ->on('productos')
                ->onDelete('cascade');
            $table->unsignedBigInteger('idalm');
            $table->foreign('idalm')
                ->references('id')
                ->on('almacens')
                ->onDelete('cascade');
            $table->string('estado', 25);
            $table->string('stock', 45);
            $table->bigInteger('cantReponer');
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
        Schema::dropIfExists('productos_almacens');
    }
};
