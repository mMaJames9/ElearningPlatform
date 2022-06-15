<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->foreign(['exam_id'], 'FK_exam_document')->references(['id'])->on('exams')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['subject_id'], 'FK_document_subject')->references(['id'])->on('subjects')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropForeign('FK_document_subject');
            $table->dropForeign('FK_exam_document');
        });
    }
}
