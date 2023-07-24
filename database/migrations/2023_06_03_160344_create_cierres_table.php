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
        Schema::create('cierres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('conteovotos');
            $table->unsignedBigInteger('mesa_id');
            $table->unsignedBigInteger('partido_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('acta_id');
            $table->timestamps();

            $table->foreign('mesa_id')->references('id')->on('mesas');
            $table->foreign('partido_id')->references('id')->on('partidos');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('acta_id')->references('id')->on('actas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cierres');
    }
};
