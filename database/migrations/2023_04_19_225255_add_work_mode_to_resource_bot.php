<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWorkModeToResourceBot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resource_bot', function (Blueprint $table) {
            $table->smallInteger('work_mode')->nullable()->after('api_key');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resource_bot', function (Blueprint $table) {
            //
        });
    }
}
