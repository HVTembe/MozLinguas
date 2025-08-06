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
        Schema::create('exercise_writing_ms', function (Blueprint $table) {
            $table->id('idExerciseWritingM');
            $table->unsignedBigInteger('idWritingLesson');
            $table->text('pergunta');
            $table->integer('pontos');
            $table->string('resposta');
            $table->string('opcaoA');
            $table->string('opcaoB');
            $table->string('opcaoC');
            $table->string('opcaoD');
            $table->timestamps();
            
            $table->foreign('idWritingLesson')->references('idWritingLesson')->on('writing_lessons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exercise_writing_ms');
    }
};
