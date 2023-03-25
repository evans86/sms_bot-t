<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdxTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->index('country_id', 'user_country_idx');
            $table->foreign('country_id', 'user_country_fk')->on('country')->references('id')->nullOnDelete();
        });

        Schema::table('order', function (Blueprint $table) {
            $table->index('user_id', 'order_user_idx');
            $table->foreign('user_id', 'order_user_fk')->on('user')->references('id');

            $table->index('bot_id', 'order_bot_idx');
            $table->foreign('bot_id', 'order_bot_fk')->on('bot')->references('id');

            $table->index('country_id', 'order_country_idx');
            $table->foreign('country_id', 'order_country_fk')->on('country')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
