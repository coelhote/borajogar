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
        Schema::table('soccer_court_schedules', function (Blueprint $table) {
            $table->integer('soccer_court')->unsigned()->after('id');
            $table->integer('weekday')->after('soccer_court');
            $table->time('start_at')->after('weekday');
            $table->time('end_at')->after('start_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('soccer_court_schedules', function (Blueprint $table) {
            $table->dropColumn('soccer_court');
            $table->dropColumn('weekday');
            $table->dropColumn('start_at');
            $table->dropColumn('end_at');
        });
    }
};
