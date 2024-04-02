<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_activities', function (Blueprint $table) {
            $table->id();
            $table->string('accion');
            $table->string('url');
            $table->string('metodo');
            $table->string('ip');
            $table->string('agente')->nullable();
            $table->integer('id_user')->nullable();
            $table->integer('id_afectado')->nullable();
            $table->string('tabla')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_activities');
    }
}
