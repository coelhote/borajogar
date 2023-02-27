<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('soccer_court_equipaments', function (Blueprint $table) {
            $table->integer('soccer_court')->unsigned()->after('id');
            $table->string('name')->after('soccer_court');
            $table->string('icon')->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('soccer_court_equipaments', function (Blueprint $table) {
            $table->dropColumn('soccer_court');
            $table->dropColumn('name');
            $table->dropColumn('icon');
        });
    }
};
