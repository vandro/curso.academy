<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_modo_pago');
            $table->date('fecha');
            $table->softDeletes();
            $table->timestamps();

            $table->index('id_cliente');
            $table->index('id_modo_pago');

            // $table->foreign('id_cliente')->references('id')->on('cliente')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('id_modo_pago')->references('id')->on('modo_pago')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura');
    }
}
