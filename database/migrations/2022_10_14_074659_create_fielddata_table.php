<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFielddataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fielddata', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("plant_id");
            $table->float("moise")->nullable();
            $table->float("hum")->nullable();
            $table->float("temp")->nullable();
            $table->float("light")->nullable();
            $table->float("nutrient")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fielddata');
    }
}
