<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id');
            $table->string('location_lon')->nullable();
            $table->string('location_lat')->nullable();
            $table->string('image')->nullable();
            $table->integer('category_id');
            $table->integer('type_id');
            $table->string('title', 60);
            $table->text('text');
            $table->integer('date_start_year');
            $table->integer('date_start_month');
            $table->integer('date_start_day');
            $table->integer('date_end_year');
            $table->integer('date_end_month');
            $table->integer('date_end_day');
            $table->integer('time_end_year');
            $table->integer('time_end_month');
            $table->integer('time_end_day');
            $table->boolean('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
