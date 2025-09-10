<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('ime');
        $table->string('prezime');
        $table->string('email')->unique();
        $table->string('telefon')->nullable();
        $table->string('lozinka'); 
        $table->foreignId('rola_id')->constrained('roles');
        $table->timestamps();
    });

    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
