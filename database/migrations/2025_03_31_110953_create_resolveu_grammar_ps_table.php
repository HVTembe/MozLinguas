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
        Schema::create('resolveu_grammar_ps', function (Blueprint $table) {
            $table->string('emailAluno');
            $table->unsignedBigInteger('idExerciseGrammarP');
            $table->integer('score');
            $table->dateTime('dataResolucao');
            $table->timestamps();
            
            $table->foreign('emailAluno')->references('email')->on('alunos');
            $table->foreign('idExerciseGrammarP')->references('idExerciseGrammarP')->on('exercise_grammar_ps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resolveu_grammar_ps');
    }
};
