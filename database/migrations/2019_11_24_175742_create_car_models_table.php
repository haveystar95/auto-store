<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_models', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name');
            $table->integer('vehiclemodel_type_id')->default(null)->nullable();
            $table->date('year_from')->default(null)->nullable();
            $table->date('year_to')->default(null)->nullable();
            $table->integer('car_mark_id');
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
        Schema::dropIfExists('car_models');
    }
}
