<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('DocumentNumber')->nullable();
            $table->string('Title'); // Field for the document title
            $table->year('Year'); // Field for the year, for example, 2022
            $table->string('PDFFile')->nullable(); // Field to upload a PDF file
            $table->enum('Status', ['pendiente', 'confirmado', 'anulado', 'eliminado']); // Field for the status of the document
            $table->string('TypeId');

            $table->unsignedBigInteger('created_by')->nullable(); // Field to store the ID of the user who created the document
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');

            $table->unsignedBigInteger('updated_by')->nullable(); // Field to store the ID of the user who edited the document
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
            
            $table->timestamps();
            $table->softDeletes(); // Add this line to add the soft delete feature
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
};
