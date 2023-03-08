<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsBotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_bots', function (Blueprint $table) {
            $table->id();
            $table->string('public_key')->nullable();
            $table->string('private_key')->nullable();
            $table->unsignedBigInteger('bot_id')->nullable();
            $table->integer('version')->default(1);
            $table->string('key')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sms_bots');
    }
}
