<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comprobantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comprobantes', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('serie');
            $table->date('fecha_com');
            $table->decimal('can_total'); // Importante: debe ser decimal(17,2)
                                        //el comprobante llevara tambien la cantidad total en letras
            $table->bigInteger('hiden'); // Ojo. debe ser null por default
            
            $table->bigInteger('fuente_id')->unsigned();
            $table->bigInteger('proyecto_id')->unsigned();
            $table->bigInteger('proveedor_id')->unsigned();
            $table->timestamps();

            $table->foreign('fuente_id')->references('id')->on('fuentes')->onDelete("no action");
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete("no action");
            $table->foreign('proveedor_id')->references('id')->on('proveedores')->onDelete("no action");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comprobantes');
    }
}
