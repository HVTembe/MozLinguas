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
        Schema::create('text_writing_lessons', function (Blueprint $table) {
            $table->unsignedBigInteger('idWritingLesson');
            $table->text('text');
            
            $table->foreign('idWritingLesson')->references('idWritingLesson')->on('writing_lessons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('text_writing_lessons');
    }
};
