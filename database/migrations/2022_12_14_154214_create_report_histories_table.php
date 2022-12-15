<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_histories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("plant_id");
            $table->integer("moise");
            $table->integer("hum");
            $table->integer("temp");
            $table->integer("light");
            $table->integer("nutrient");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_histories');
    }
}
