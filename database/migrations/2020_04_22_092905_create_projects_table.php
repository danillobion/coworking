<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('titulo',1000);
            $table->string('conteudo',10000);
            $table->string('tipo');
            $table->string('status');
            $table->date('dataTermino')->nullable();
            $table->integer('visualizacao');
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
        Schema::dropIfExists('projects');
    }
}
