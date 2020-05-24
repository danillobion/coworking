<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigpaginainicialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configpaginainicials', function (Blueprint $table) {
            $table->id();
            $table->string('titulo1',1000);
            $table->string('subtitulo1',1000);
            $table->string('texto',10000);
            $table->string('titulo2',1000);
            $table->string('subtitulo2',1000)->nullable();
            $table->string('titulo3',1000);
            $table->string('legenda1',1000);
            $table->string('titulo4',1000);
            $table->string('legenda2',1000);
            $table->string('titulo5',1000);
            $table->string('legenda3',1000);
            $table->string("imagemCapa1")->nullable();
            $table->string("imagemCapa2")->nullable();
            $table->string("imagemCapa3")->nullable();
            $table->string("imagemCapa4")->nullable();
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
        Schema::dropIfExists('configpaginainicials');
    }
}
