<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourceServiceCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_service_country', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resource_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('service_id')->nullable();
            $table->integer('price')->nullable();
            $table->integer('count')->nullable();
            $table->timestamps();

            $table->index('resource_id', 'resource_service_country-resource-idx');
            $table->foreign('resource_id', 'resource_service_country-resource-fk')->on('resource')->references('id');

            $table->index('country_id', 'resource_service_country-country-idx');
            $table->foreign('country_id', 'resource_service_country-country-fk')->on('country')->references('id');

            $table->index('service_id', 'resource_service_country-service-idx');
            $table->foreign('service_id', 'resource_service_country-service-fk')->on('service')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resource_service_countries');
    }
}
