<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('leciona', function (Blueprint $table) {
            $table->string('email_teacher');
            $table->string('codigo_lingua');
            $table->timestamps();

            $table->foreign('email_teacher')->references('email')->on('teachers')->onDelete('cascade');
            $table->foreign('codigo_lingua')->references('codigo')->on('linguas')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('leciona');
    }
};
