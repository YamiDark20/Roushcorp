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
        Schema::table('encargado_ventas', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->nullable()->onDelete('cascade');
            $table->foreignId('almacen_id')->constrained('almacens')->nullable()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('encargado_ventas', function (Blueprint $table) {
            $table->dropForeign('encargado_ventas_user_id_foreign');
            $table->dropForeign('encargado_ventas_almacen_id_foreign');
        });
    }
};
