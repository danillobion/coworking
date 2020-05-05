<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
          $table->id();
          $table->string('nome');
          $table->string('tipo');
          $table->string('area')->nullable();
          $table->string('lattes')->nullable();
          $table->string("imagemCapa")->nullable();
          $table->timestamps();

          $table->bigInteger("user_id")->nullable();
          $table->foreign("user_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
}
