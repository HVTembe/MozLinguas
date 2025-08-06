<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('gerencia_linguas', function (Blueprint $table) {
            $table->string('email_admin');
            $table->string('codigo_lingua');
            $table->integer('accao'); // 1 = adicionou, 2 = eliminou
            $table->timestamps();

            // Definição das chaves estrangeiras
            $table->foreign('email_admin')->references('email')->on('admins')->onDelete('cascade');
            $table->foreign('codigo_lingua')->references('codigo')->on('linguas')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('gerencia_linguas');
    }
};
