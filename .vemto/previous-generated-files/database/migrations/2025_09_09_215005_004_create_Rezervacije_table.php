<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Rezervacije', function (Blueprint $table) {
            $table->id();

            $table->foreignId('korisnik_id');

            $table->foreignId('soba_id');

            $table->foreignId('status_id');

            $table->date('datum_od');

            $table->date('datum_do');

            $table->bigInteger('user_id')->unsigned();

            $table->bigInteger('sobe_id')->unsigned();

            $table->timestamp('created_at')->nullable();

            $table->timestamp('updated_at')->nullable();

            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table
                ->foreign('sobe_id')
                ->references('id')
                ->on('Sobe')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table
                ->foreign('status_id')
                ->references('id')
                ->on('Status')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Rezervacije');
    }
};
