<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('factura', function (Blueprint $table) {
            $table->foreign('id_cliente')->references('id')->on('cliente')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_modo_pago')->references('id')->on('modo_pago')->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('detalle', function (Blueprint $table) {
            $table->foreign('id_factura')->references('id')->on('factura')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_producto')->references('id')->on('producto')->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('producto', function (Blueprint $table) {
            $table->foreign('id_categoria')->references('id')->on('categoria')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('factura', function(Blueprint $table)
        {
            $table->dropForeign(['id_cliente']);
            $table->dropForeign(['id_modo_pago']);
            $table->dropColumn('id_cliente');
            $table->dropColumn('id_modo_pago');

        });
        Schema::table('detalle', function(Blueprint $table)
        {
            $table->dropForeign(['id_factura']);
            $table->dropForeign(['id_producto']);
            $table->dropColumn('id_factura');
            $table->dropColumn('id_producto');

        });
        Schema::table('producto', function(Blueprint $table)
        {
            $table->dropForeign(['id_categoria']);
            $table->dropColumn('id_categoria');

        });
    }
}
