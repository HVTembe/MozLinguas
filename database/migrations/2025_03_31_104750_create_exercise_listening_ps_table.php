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
        Schema::create('exercise_listening_ps', function (Blueprint $table) {
            $table->id('idExerciseListeningP');
            $table->unsignedBigInteger('idListeningLesson');
            $table->integer('pontos');
            $table->text('pergunta');
            $table->timestamps();
            
            $table->foreign('idListeningLesson')->references('idListeningLesson')->on('listening_lessons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exercise_listening_ps');
    }
};
