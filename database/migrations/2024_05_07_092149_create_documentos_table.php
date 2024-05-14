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
            $table->integer('NrDocumento');
            $table->string('A');
            $table->string('VIA');
            $table->string('DE');
            $table->string('Ref');
            $table->Date('Fecha');
            $table->text('Antecedentes');
            $table->text('BaseLegal');
            $table->text('ConclusiondesyConsideraciones');
            $table->text('Vistos');
            $table->text('Consideraciones');
            $table->text('PorTanto');
            $table->text('Decreta');
            $table->text('Resuelve');
            $table->text('ConsideracionesLegales');
            $table->text('Articulo');
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
