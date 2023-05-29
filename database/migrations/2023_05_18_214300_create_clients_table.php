<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name_society');
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('adresse');
            $table->string('type');
            $table->string('email');
            $table->string('Pays');
            $table->string('ville')->nullable();
            $table->string('code_postal')->nullable();
            $table->string('date_relation')->nullable();
            $table->string('notes')->nullable();
            $table->string('tele1');
            $table->string('tele2')->nullable();



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
        Schema::dropIfExists('clients');
    }
}
