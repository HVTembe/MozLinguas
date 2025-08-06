<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('linguas', function (Blueprint $table) {
            $table->string('codigo')->primary();
            $table->string('nome');
            $table->date('data_criacao');
            $table->string('regiao');
            $table->text('historia');
            $table->integer('nr_falantes');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('linguas');
    }
};
