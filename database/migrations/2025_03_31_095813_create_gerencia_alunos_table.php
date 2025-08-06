<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('gerencia_alunos', function (Blueprint $table) {
            $table->string('email_admin');
            $table->string('email_aluno');
            $table->integer('accao'); // 1 = adicionou, 2 = eliminou
            $table->timestamps();

            // Definição das chaves estrangeiras
            $table->foreign('email_admin')->references('email')->on('admins')->onDelete('cascade');
            $table->foreign('email_aluno')->references('email')->on('alunos')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('gerencia_alunos');
    }
};
