<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comprobantefacturas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comprobantefacturas', function (Blueprint $table) {
            $table->engine="InnoDB";
            
            $table->bigIncrements('id');
            $table->bigInteger('factura_id')->unsigned();
            $table->bigInteger('comprobante_id')->unsigned();
            $table->bigInteger('hiden'); // Ojo. debe ser null por default

            
            $table->foreign('factura_id')->references('id')->on('facturas')->onDelete('cascade');
            $table->foreign('comprobante_id')->references('id')->on('comprobantes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comprobantefacturas');
    }
}
