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
        Schema::create('soccer_courts', function (Blueprint $table) {
            $table->id();
            $table->integer('establishment_id')->unsigned();
            $table->integer('court_type')->unsigned();
            $table->string('name');
            $table->double('width');
            $table->double('length');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soccer_courts');
    }
};
