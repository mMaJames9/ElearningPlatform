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
            $table->foreign(['document_id', 'user_id'], 'FK_document_user')->references(['id'])->on('documents')->onUpdate('CASCADE')->onDelete('CASCADE');
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
            $table->dropForeign('FK_document_user');
        });
    }
}
