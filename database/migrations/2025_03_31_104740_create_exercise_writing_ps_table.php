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
        Schema::create('exercise_writing_ps', function (Blueprint $table) {
            $table->id('idExerciseWritingP');
            $table->unsignedBigInteger('idWritingLesson');
            $table->integer('pontos');
            $table->text('pergunta');
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
        Schema::dropIfExists('exercise_writing_ps');
    }
};
