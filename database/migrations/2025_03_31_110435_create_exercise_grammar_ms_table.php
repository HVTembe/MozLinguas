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
        Schema::create('exercise_grammar_ms', function (Blueprint $table) {
            $table->id('idExerciseGrammarM');
            $table->unsignedBigInteger('idGrammarLesson');
            $table->text('pergunta');
            $table->integer('pontos');
            $table->string('resposta');
            $table->string('opcaoA');
            $table->string('opcaoB');
            $table->string('opcaoC');
            $table->string('opcaoD');
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
        Schema::dropIfExists('exercise_grammar_ms');
    }
};
