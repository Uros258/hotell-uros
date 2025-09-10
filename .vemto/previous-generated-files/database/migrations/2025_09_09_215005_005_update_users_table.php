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
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname')->after('name');

            $table->string('phone')->after('email_verified_at');

            $table->foreignId('role_id')->after('remember_token');

            $table
                ->foreign('role_id')
                ->references('id')
                ->on('Role')
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('surname');
            $table->dropColumn('phone');
            $table->dropColumn('role_id');

            $table->dropForeign('users_role_id_foreign');
        });
    }
};
