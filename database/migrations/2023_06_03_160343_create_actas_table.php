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
        Schema::create('actas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('votosasignadosacta');
            $table->bigInteger('diferencia');
            $table->bigInteger('total');
            $table->string('fotoacta',200);
            $table->string('tipopartidoacta',45);
            $table->unsignedBigInteger('mesa_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('mesa_id')->references('id')->on('mesas');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actas');
    }
};
