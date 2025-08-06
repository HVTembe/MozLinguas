<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('gerencia_teachers', function (Blueprint $table) {
            $table->string('email_admin');
            $table->string('email_teacher');
            $table->integer('accao');
            $table->timestamps();

            $table->foreign('email_admin')->references('email')->on('admins')->onDelete('cascade');
            $table->foreign('email_teacher')->references('email')->on('teachers')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('gerencia_teachers');
    }
};
