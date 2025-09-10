<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sobe', function (Blueprint $table) {
            $table->id();
            $table->string('status_sobe'); 
            $table->string('tip_sobe');    
            $table->integer('broj_sobe');
            $table->decimal('cena', 8, 2); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sobe');
    }
};
