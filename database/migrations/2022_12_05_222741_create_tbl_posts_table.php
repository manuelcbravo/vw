<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_posts', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->nullable();
            $table->string('img_portada')->nullable();
            $table->text('cuerpo')->nullable();
            $table->text('key_words')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('slug')->unique();
            $table->string('categoria');
            $table->string('tags');
            $table->integer('vistas')->default(0);
            $table->integer('status')->default(1)->nullable();
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
        Schema::dropIfExists('tbl_posts');
    }
}
