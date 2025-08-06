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
        Schema::create('resolveu_vocabulary_ps', function (Blueprint $table) {
            $table->string('emailAluno');
            $table->unsignedBigInteger('idExerciseVocabularyP');
            $table->integer('score');
            $table->dateTime('dataResolucao');
            $table->timestamps();
            
            $table->foreign('emailAluno')->references('email')->on('alunos');
            $table->foreign('idExerciseVocabularyP')->references('idExerciseVocabularyP')->on('exercise_vocabulary_ps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resolveu_vocabulary_ps');
    }
};
