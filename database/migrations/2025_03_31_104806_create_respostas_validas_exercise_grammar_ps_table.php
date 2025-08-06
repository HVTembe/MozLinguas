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
        Schema::create('respostas_validas_exercise_grammar_ps', function (Blueprint $table) {
            $table->unsignedBigInteger('idExerciseGrammarP');
            $table->text('resposta');
            
            $table->foreign('idExerciseGrammarP')->references('idExerciseGrammarP')->on('exercise_grammar_ps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respostas_validas_exercise_grammar_ps');
    }
};
