<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChauffeursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chauffeurs', function (Blueprint $table) {
            $table->id();
            /*there are 28*/
            $table->string('Nom');
            $table->string('Prenom');
            $table->string('Date_de_naissance');
            $table->string('CIN');
            $table->string('Télé')->nullable();
            $table->string('Sexe')->nullable();
            $table->string('Adresse')->nullable();
            $table->string('Situation_familiale')->nullable();
            $table->string('Nombre_enfants')->nullable();
            $table->string('Nombre_déduction')->nullable();
            $table->string('Nationalité')->nullable();
            $table->string('Transport')->nullable();
            $table->string('Ville')->nullable();
            $table->string('Matricule');
            $table->string('Date_embauche')->nullable();
            $table->string('Date_départ')->nullable();
            $table->string('Salaire_de_base')->nullable();
            $table->string('Taux_Horaire')->nullable();
            $table->string('Banque')->nullable();
            $table->string('N_Camp_banc')->nullable();
            $table->string('Mode_de_réglement')->nullable();
            $table->string('Prime_présentaion')->nullable();
            $table->string('Prime_de_panier')->nullable();
            $table->string('Prime_de_logement')->nullable();
            $table->string('Retraite')->nullable();
            $table->string('CNSS')->nullable();
            $table->string('Date_affiliation')->nullable();
            $table->string('type');



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
        Schema::dropIfExists('chauffeurs');
    }
}
