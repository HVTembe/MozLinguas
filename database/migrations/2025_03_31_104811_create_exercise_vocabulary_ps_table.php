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
        Schema::create('exercise_vocabulary_ps', function (Blueprint $table) {
            $table->id('idExerciseVocabularyP');
            $table->unsignedBigInteger('idVocabularyLesson');
            $table->integer('pontos');
            $table->text('pergunta');
            $table->timestamps();
            
            $table->foreign('idVocabularyLesson')->references('idVocabularyLesson')->on('vocabulary_lessons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exercise_vocabulary_ps');
    }
};
