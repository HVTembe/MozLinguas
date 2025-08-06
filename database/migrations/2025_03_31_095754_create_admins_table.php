<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('admins', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('nome');
            $table->string('password');
            $table->date('data_inscricao');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('admins');
    }
};
