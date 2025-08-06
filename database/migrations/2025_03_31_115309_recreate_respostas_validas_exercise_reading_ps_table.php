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
        Schema::dropIfExists('respostas_validas_exercise_reading_ps');
        
        Schema::create('respostas_validas_exercise_reading_ps', function (Blueprint $table) {
            $table->unsignedBigInteger('idExerciseReadingP');
            $table->text('resposta');
            
            $table->foreign('idExerciseReadingP')
                  ->references('idExerciseReadingP')
                  ->on('exercise_reading_ps')
                  ->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('respostas_validas_exercise_reading_ps');
    }
};
