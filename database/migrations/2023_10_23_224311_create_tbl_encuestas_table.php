<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Traits\Uuids;

class CreateTblEncuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_encuestas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_sucursal');
            $table->integer('id_tipo_encuesta')->default('1')->comment('1 general, personalizada');
            $table->string('api_token', 80)->unique()->nullable()->default(null);
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
        Schema::dropIfExists('tbl_encuestas');
    }
}
