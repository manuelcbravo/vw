<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Http\Traits\Uuids;

class CreateTblSucursalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sucursales', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nombre');
            $table->string('prefijo');
            $table->integer('id_estado');
            $table->integer('id_municipio');
            // $table->integer('id_colonia')->nullable();
            $table->integer('id_encargado')->nullable();
            $table->integer('id_usuario_reg');
            $table->string('calle')->nullable();
            $table->string('interior')->nullable();
            $table->string('exterior')->nullable();
            $table->string('cp')->nullable();
            $table->double('latitud',8,2)->nullable();
            $table->double('longitud',8,2)->nullable();
            $table->text('comentario')->nullable();
            $table->integer('activo')->default(2)->comment('0 inactivo, 1 activo');
            $table->integer('encuesta')->default(1)->comment('1 general, 0 personalizada');
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
        Schema::dropIfExists('tbl_sucursales');
    }
}
