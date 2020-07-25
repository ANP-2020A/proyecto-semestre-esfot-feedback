<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('FK_idQuestion');
            $table->foreign('FK_idQuestion')->references('id')->on('questions')->onDelete('restrict');
            $table->string('FK_idUser');
            $table->unsignedBigInteger('FK_idChapter');
            $table->foreign('FK_idChapter')->references('id')->on('chapters')->onDelete('restrict');
            $table->string('Value');
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
        Schema::dropIfExists('answers');
    }
}
