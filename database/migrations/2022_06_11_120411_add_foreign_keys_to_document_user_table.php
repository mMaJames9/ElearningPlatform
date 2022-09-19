<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDocumentUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('document_user', function (Blueprint $table) {
        //     $table->foreignId('user_id')
        //     ->nullable()
        //     ->constrained('users')
        //     ->onUpdate('cascade')
        //     ->onDelete('cascade');

        //     $table->foreignId('document_id')
        //     ->nullable()
        //     ->constrained('documents')
        //     ->onUpdate('cascade')
        //     ->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('document_user', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['document_id']);
        });
    }
}
