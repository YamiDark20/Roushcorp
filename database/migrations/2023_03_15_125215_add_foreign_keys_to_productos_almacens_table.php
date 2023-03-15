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
        Schema::table('productos_almacens', function (Blueprint $table) {
            $table->foreignId('idprod')->constrained('productos')->nullable()->onDelete('cascade');
            $table->foreignId('idalm')->constrained('almacens')->nullable()->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos_almacens', function (Blueprint $table) {
            $table->dropForeign('productos_almacens_idprod_foreign');
            $table->dropForeign('productos_almacens_idalm_foreign');
        });
    }
};
