<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourceServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_service', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resource_id')->nullable();
            $table->unsignedBigInteger('service_id')->nullable();
            $table->string('org_id')->nullable();
            $table->timestamps();

            $table->index('resource_id', 'resource_service-resource-idx');
            $table->foreign('resource_id', 'resource_service-resource-fk')->on('resource')->references('id');

            $table->index('service_id', 'resource_service-service-idx');
            $table->foreign('service_id', 'resource_service-service-fk')->on('service')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resource_services');
    }
}
