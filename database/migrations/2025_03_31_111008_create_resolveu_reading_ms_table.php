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
        Schema::create('resolveu_reading_ms', function (Blueprint $table) {
            $table->string('emailAluno');
            $table->unsignedBigInteger('idExerciseReadingM');
            $table->integer('score');
            $table->dateTime('dataResolucao');
            $table->timestamps();
            
            $table->foreign('emailAluno')->references('email')->on('alunos');
            $table->foreign('idExerciseReadingM')->references('idExerciseReadingM')->on('exercise_reading_ms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resolveu_reading_ms');
    }
};
