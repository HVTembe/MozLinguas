<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('estuda', function (Blueprint $table) {
            $table->string('email_aluno');
            $table->string('codigo_lingua');
            $table->date('data_inicio');
            $table->timestamps();

            $table->foreign('email_aluno')->references('email')->on('alunos')->onDelete('cascade');
            $table->foreign('codigo_lingua')->references('codigo')->on('linguas')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('estuda');
    }
};
