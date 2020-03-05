<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiasTable extends Migration
{
       /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('titulo');
                $table->string('fecha');
                $table->string('autor')->nullable(true);
                $table->string('importancia');
                $table->string('idcategoria');
                $table->text('informacionArt');
                $table->text('imgdesmostrativa');
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
        Schema::dropIfExists('noticias');
    }
}
