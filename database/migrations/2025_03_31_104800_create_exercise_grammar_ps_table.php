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
        Schema::create('exercise_grammar_ps', function (Blueprint $table) {
            $table->id('idExerciseGrammarP');
            $table->unsignedBigInteger('idGrammarLesson');
            $table->integer('pontos');
            $table->text('pergunta');
            $table->timestamps();
            
            $table->foreign('idGrammarLesson')->references('idGrammarLesson')->on('grammar_lessons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exercise_grammar_ps');
    }
};
