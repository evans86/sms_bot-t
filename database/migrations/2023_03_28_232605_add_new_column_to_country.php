<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnToCountry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('country', function (Blueprint $table) {
            $table->string('iso_two')->nullable()->after('name_en');
            $table->string('iso_three')->nullable()->after('iso_two');
            $table->dropColumn(['org_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('country', function (Blueprint $table) {
            //
        });
    }
}
