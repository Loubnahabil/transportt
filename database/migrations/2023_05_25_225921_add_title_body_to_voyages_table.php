<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleBodyToVoyagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('voyages', function (Blueprint $table) {
            $table->string('con');
            $table->string('provenance')->nullable();
            $table->string('destination')->nullable();
            $table->string('date_sortie')->nullable();
            $table->string('date_arrivee')->nullable();
            $table->string('j_maroc')->nullable();
            $table->string('kilometrage')->nullable();
            $table->string('j_etranger')->nullable();
            $table->string('scelles')->nullable();
            $table->string('observation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('voyages', function (Blueprint $table) {
            //
        });
    }
}
