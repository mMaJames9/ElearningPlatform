<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClassroomDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('classroom_document', function (Blueprint $table) {
            $table->foreignId('document_id')
            ->nullable()
            ->constrained('documents')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('classroom_id')
            ->nullable()
            ->constrained('classrooms')
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
        Schema::table('classroom_document', function (Blueprint $table) {
            $table->dropForeign(['document_id']);
            $table->dropForeign(['classroom_id']);
        });
    }
}
