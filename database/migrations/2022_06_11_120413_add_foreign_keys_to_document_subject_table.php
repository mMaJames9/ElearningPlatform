<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDocumentSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('document_subject', function (Blueprint $table) {
            $table->foreign(['subject_id', 'document_id'], 'FK_document_subject')->references(['id'])->on('documents')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('document_subject', function (Blueprint $table) {
            $table->dropForeign('FK_document_subject');
        });
    }
}
