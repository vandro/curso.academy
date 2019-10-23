<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
            // $table->bigIncrements('id');
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('id_factura');
            $table->unsignedBigInteger('id_producto');
            $table->integer('cantidad');
            $table->decimal('precio', 8, 2);
            $table->softDeletes();
            $table->timestamps();

            $table->index('id_factura');
            $table->index('id_producto');

            $table->primary(['id', 'id_factura']);

            // $table->foreign('id_factura')->references('id')->on('factura')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('id_producto')->references('id')->on('producto')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('detalle', function (Blueprint $table) {
            $table->unsignedBigInteger('id', true, true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('detalle', function($table)
        {
        // $table->dropForeign('lists_user_id_foreign');
        // $table->foreign('user_id')->references('id')->on('users');
        // $table->dropForeign('lists_user_id_foreign');
        // $table->dropIndex('lists_user_id_index');
        // $table->dropColumn('user_id');
        });
    }
}
