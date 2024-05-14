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
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->integer('NrDocumento')->nullable();
            $table->string('A')->nullable();
            $table->string('VIA')->nullable();
            $table->string('DE')->nullable();
            $table->string('Ref')->nullable();
            $table->Date('Fecha')->nullable();
            $table->text('Antecedentes')->nullable();
            $table->text('BaseLegal')->nullable();
            $table->text('ConclusiondesyConsideraciones')->nullable();
            $table->text('Vistos')->nullable();
            $table->text('Consideraciones')->nullable();
            $table->text('PorTanto')->nullable();
            $table->text('Decreta')->nullable();
            $table->text('Resuelve')->nullable();
            $table->text('ConsideracionesLegales')->nullable();
            $table->text('Articulo')->nullable();
            $table->integer('Idtipo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos');
    }
};
