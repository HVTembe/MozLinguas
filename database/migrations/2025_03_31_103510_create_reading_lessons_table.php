<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reading_lessons', function (Blueprint $table) {
            $table->id('idReadingLesson');
            $table->string('codigoLingua');
            $table->string('titulo');
            $table->dateTime('dataCriacao');
            $table->string('emailTeacher');
            $table->timestamps();
            
            $table->foreign('codigoLingua')->references('codigo')->on('linguas');
            $table->foreign('emailTeacher')->references('email')->on('teachers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reading_lessons');
    }
};
