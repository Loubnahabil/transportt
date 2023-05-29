<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarchandisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marchandises', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();;
            $table->float('poids_net');
            $table->float('poids_brut');
            $table->float('longueur')->nullable();;
            $table->float('largeur')->nullable();;
            $table->float('hauteur')->nullable();;
            $table->string('nature');
            $table->float('valeur');
            $table->string('origine');
            $table->string('destination');
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
        Schema::dropIfExists('marchandises');
    }
}
