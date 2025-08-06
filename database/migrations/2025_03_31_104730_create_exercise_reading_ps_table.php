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
        Schema::create('exercise_reading_ps', function (Blueprint $table) {
            $table->id('idExerciseReadingP');
            $table->unsignedBigInteger('idReadingLesson');
            $table->integer('pontos');
            $table->text('pergunta');
            $table->timestamps();
            
            $table->foreign('idReadingLesson')->references('idReadingLesson')->on('reading_lessons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exercise_reading_ps');
    }
};
