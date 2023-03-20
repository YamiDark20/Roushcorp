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
        Schema::create('productos_comprados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('compra_id')->constrained('compras')->nullable()->onDelete('cascade');
            $table->foreignId('producto_id')->constrained('productos')->nullable()->onDelete('cascade');
            $table->string('estado');
            $table->integer('cantidad');
            // $table->decimal('precio', 9,2);
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
        Schema::dropIfExists('productos_comprados');
    }
};
