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
            $table->foreignId('document_id')
            ->nullable()
            ->constrained('documents')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('subject_id')
            ->nullable()
            ->constrained('subjects')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
            $table->dropForeign(['document_id']);
            $table->dropForeign(['subject_id']);
        });
    }
}
