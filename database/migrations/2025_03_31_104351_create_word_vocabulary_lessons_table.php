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
        Schema::create('word_vocabulary_lessons', function (Blueprint $table) {
            $table->unsignedBigInteger('idVocabularyLesson');
            $table->string('word');
            $table->text('meaning');
            
            $table->foreign('idVocabularyLesson')->references('idVocabularyLesson')->on('vocabulary_lessons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('word_vocabulary_lessons');
    }
};
