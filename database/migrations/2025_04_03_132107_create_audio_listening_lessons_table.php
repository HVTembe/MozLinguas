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
        Schema::create('audio_listening_lessons', function (Blueprint $table) {
            $table->unsignedBigInteger('idListeningLesson');
            $table->string('audio');
            
            $table->foreign('idListeningLesson')->references('idListeningLesson')->on('listening_lessons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audio_listening_lessons');
    }
};

