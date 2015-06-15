<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Llenado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('llenado', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cilindro_id')->unsigned();
            $table->integer('tercero_id')->unsigned();
            $table->enum('estado',['llenado','lleno']);
            $table->string('notas', 1000)->nullable();
            $table->timestamps();

            $table->foreign('tercero_id')->references('id')->on('tercero')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('cilindro_id')->references('id')->on('cilindro')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('llenado');
    }
}
