<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_orders', function (Blueprint $table) {
            $table->id();
            $table->string('org_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('operator')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('sms_orders');
    }
}
