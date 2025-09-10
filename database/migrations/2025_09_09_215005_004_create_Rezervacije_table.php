<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rezervacije', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('soba_id')->constrained('sobe')->onDelete('cascade');
            $table->foreignId('status_id')->constrained('statuses')->onDelete('cascade');
            $table->date('datum_od');
            $table->date('datum_do');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rezervacije');
    }
};
