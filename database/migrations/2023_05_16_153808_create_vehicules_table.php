<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('matricule');
            $table->string('marque');
            $table->string('type');
            $table->string('genre');
            $table->string('proprietaire');
            $table->string('date_circulation');
            $table->string('mc');
            $table->string('mutation');
            $table->string('validite_date')->nullable();
            $table->string('modele');
            $table->string('carburant')->nullable();
            $table->string('n_chassis');
            $table->string('poids');
            $table->string('ptac');
            $table->string('puissance');
            $table->string('nbre_cylindres');
            $table->string('ptmct')->nullable();
            $table->string('pdf_file')->nullable();
            
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
        Schema::dropIfExists('vehicules');
    }
}
