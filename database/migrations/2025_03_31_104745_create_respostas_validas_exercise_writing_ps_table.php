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
        Schema::create('respostas_validas_exercise_writing_ps', function (Blueprint $table) {
            $table->unsignedBigInteger('idExerciseWritingP');
            $table->text('resposta');
            
            $table->foreign('idExerciseWritingP')->references('idExerciseWritingP')->on('exercise_writing_ps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respostas_validas_exercise_writing_ps');
    }
};
