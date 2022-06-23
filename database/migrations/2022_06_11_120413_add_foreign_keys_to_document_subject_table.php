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
            $table->foreign('document_id', 'FK_document_subject_document')->references('id')->on('documents')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('subject_id', 'FK_document_subject_subject')->references('id')->on('subjects')->onUpdate('cascade')->onDelete('cascade');
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
            $table->dropForeign('FK_document_subject_document');
            $table->dropForeign('FK_document_subject_subject');
        });
    }
}
