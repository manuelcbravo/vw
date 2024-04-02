<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Traits\Uuids;

class CreateTblEncuestaRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_encuesta_respuestas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_lead');
            $table->uuid('id_tratamiento');
            $table->uuid('id_encuesta_pregunta');
            $table->uuid('id_encuesta');
            $table->integer('respuesta')->nullable();
            $table->string('especificar')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('tbl_encuesta_respuestas');
    }
}
