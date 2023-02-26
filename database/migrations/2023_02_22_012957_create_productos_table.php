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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 45);
            $table->string('nombre', 45);
            $table->string('marca', 45);
            $table->decimal('peso', 9, 2);
            $table->string('descripcion', 50);
            $table->integer('cantidad');
            $table->decimal('precio', 9,2);
            $table->boolean('exonerado');
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
        Schema::dropIfExists('productos');
    }
};
