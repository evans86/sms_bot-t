<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourceCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_country', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resource_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->string('org_id')->nullable();
            $table->timestamps();

            $table->index('resource_id', 'resource_country-resource-idx');
            $table->foreign('resource_id', 'resource_country-resource-fk')->on('resource')->references('id');

            $table->index('country_id', 'resource_country-country-idx');
            $table->foreign('country_id', 'resource_country-country-fk')->on('country')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resource_countries');
    }
}
