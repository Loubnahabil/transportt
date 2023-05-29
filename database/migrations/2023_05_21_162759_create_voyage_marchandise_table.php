<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoyageMarchandiseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voyage_marchandise', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('voyage_id');
            $table->unsignedBigInteger('marchandise_id');
            $table->foreign('voyage_id')->references('id')->on('voyages')->onDelete('cascade');
            $table->foreign('marchandise_id')->references('id')->on('marchandises')->onDelete('cascade');
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
        Schema::dropIfExists('voyage_marchandise');
    }
}
