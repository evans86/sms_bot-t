<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourceBotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_bot', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resource_id')->nullable();
            $table->unsignedBigInteger('bot_id')->nullable();
            $table->string('api_key')->nullable();
            $table->timestamps();

            $table->index('resource_id', 'resource_bot-resource-idx');
            $table->foreign('resource_id', 'resource_bot-resource-fk')->on('resource')->references('id');

            $table->index('bot_id', 'resource_bot-bot-idx');
            $table->foreign('bot_id', 'resource_bot-bot-fk')->on('bot')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resource_bots');
    }
}
