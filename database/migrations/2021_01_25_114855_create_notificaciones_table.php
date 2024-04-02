<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_notificaciones', function (Blueprint $table) {
            $table->id();
            $table->integer('id_emisor');
            $table->integer('id_receptor');
            $table->string('notificacion');
            $table->string('url');
            $table->tinyInteger('visto')->default('0');
            $table->dateTime('fecha_vista')->nullable();
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
        Schema::dropIfExists('tbl_notificaciones');
    }
}
