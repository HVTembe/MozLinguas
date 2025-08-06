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
        Schema::create('resolveu_writing_ps', function (Blueprint $table) {
            $table->string('emailAluno');
            $table->unsignedBigInteger('idExerciseWritingP');
            $table->integer('score');
            $table->dateTime('dataResolucao');
            $table->timestamps();
            
            $table->foreign('emailAluno')->references('email')->on('alunos');
            $table->foreign('idExerciseWritingP')->references('idExerciseWritingP')->on('exercise_writing_ps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resolveu_writing_ps');
    }
};
