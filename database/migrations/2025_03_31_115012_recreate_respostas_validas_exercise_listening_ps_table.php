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
    Schema::dropIfExists('respostas_validas_exercise_listening_ps');
    
    Schema::create('respostas_validas_exercise_listen_ps', function (Blueprint $table) {
        $table->unsignedBigInteger('idExerciseListenP');
        $table->text('resposta');
        
        $table->foreign('idExerciseListenP')
              ->references('idExerciseListeningP')
              ->on('exercise_listening_ps')
              ->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('respostas_validas_exercise_listening_ps');
}
};
