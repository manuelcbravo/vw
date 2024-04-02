<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Traits\Uuids;

class CreateTblEncuestaPreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_encuesta_preguntas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_encuesta');
            $table->uuid('id_sucursal')->nullable();
            $table->string('pregunta');
            $table->string('tipo_pregunta');
            $table->string('idioma');
            $table->string('respuesta')->nullable();
            $table->string('especificar')->nullable();
            $table->integer('estatus')->nullable()->default(1);
            $table->integer('numero')->nullable();
            $table->integer('icono')->nullable();
            $table->string('icono_url')->nullable();
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
        Schema::dropIfExists('tbl_encuesta_preguntas');
    }
}
