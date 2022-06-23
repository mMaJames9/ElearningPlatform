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
        Schema::table('document_user', function (Blueprint $table) {
            $table->foreign('user_id', 'FK_document_user_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('document_id', 'FK_document_user_document')->references('id')->on('documents')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('document_user', function (Blueprint $table) {
            $table->dropForeign('FK_document_user_user');
            $table->dropForeign('FK_document_user_document');
        });
    }
}
