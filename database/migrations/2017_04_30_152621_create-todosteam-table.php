<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodosteamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todosteam', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id');
            $table->integer('creator_id');
            $table->integer('memory_id');
            $table->string('title', 60);
            $table->text('description')->nullable();
            $table->boolean('status');
            $table->integer('date_year');
            $table->integer('date_month');
            $table->integer('date_day');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todosteam');
    }
}
