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
        Schema::create('Sobe', function (Blueprint $table) {
            $table->id();

            $table->integer('broj_sobe');

            $table->decimal('cena_sobe');

            $table->string('status_sobe');

            $table->bigInteger('status_id')->unsigned();

            $table->timestamp('created_at')->nullable();

            $table->timestamp('updated_at')->nullable();

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
        Schema::dropIfExists('Sobe');
    }
};
