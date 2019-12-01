<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_configurations', function (Blueprint $table) {
            $table->integer('id')->unique();
            $table->string('axletype')->nullable()->default(null);
            $table->string('bodytype')->nullable()->default(null);
            $table->string('ccm')->nullable()->default(null);
            $table->string('cylinders')->nullable()->default(null);
            $table->string('drivetype')->nullable()->default(null);
            $table->string('engines')->nullable()->default(null);
            $table->string('enginetype')->nullable()->default(null);
            $table->string('fuelmixturetype')->nullable()->default(null);
            $table->string('fueltype')->nullable()->default(null);
            $table->string('gross_weight_tons')->nullable()->default(null);
            $table->string('homologation_numbers')->nullable()->default(null);
            $table->string('hp')->nullable()->default(null);
            $table->string('is_motorbike')->nullable()->default(null);
            $table->string('ktypnr')->nullable()->default(null);
            $table->string('kw')->nullable()->default(null);
            $table->string('name')->nullable()->default(null);
            $table->string('resource_uri')->nullable()->default(null);
            $table->string('valves')->nullable()->default(null);
            $table->string('vehicle_picture')->nullable()->default(null);
            $table->string('year_from')->nullable()->default(null);
            $table->string('year_to')->nullable()->default(null);
            $table->integer('car_model_id');
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
        Schema::dropIfExists('model_configurations');
    }
}
