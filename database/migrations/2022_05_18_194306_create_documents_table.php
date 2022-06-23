<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('exam_id');
            $table->string('document_session')->nullable();
            $table->string('document_serie')->nullable();
            $table->string('document_title')->nullable();
            $table->string('document_type')->nullable();
            $table->text('document_description')->nullable();
            $table->integer('document_price')->nullable();
            $table->string('document_path')->nullable();
            $table->string('correction_path')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
