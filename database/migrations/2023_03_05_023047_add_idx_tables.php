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
        Schema::table('sms_users', function (Blueprint $table) {
            $table->index('country_id', 'user_country_idx');
            $table->foreign('country_id', 'user_country_fk')->on('sms_countries')->references('id');
        });

        Schema::table('sms_users', function (Blueprint $table) {
            $table->index('operator_id', 'user_operator_idx');
            $table->foreign('operator_id', 'user_operator_fk')->on('sms_operators')->references('id');
        });

        Schema::table('sms_operators', function (Blueprint $table) {
            $table->index('country_id', 'operator_country_idx');
            $table->foreign('country_id', 'operator_country_fk')->on('sms_countries')->references('id');
        });

        Schema::table('sms_orders', function (Blueprint $table) {
            $table->index('user_id', 'order_user_idx');
            $table->foreign('user_id', 'order_user_fk')->on('sms_users')->references('id');
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
