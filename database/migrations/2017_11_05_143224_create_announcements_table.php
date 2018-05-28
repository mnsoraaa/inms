<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            //
            $table->increments('id')->unique();
            $table->dateTime('date');
            $table->string('title');
            $table->string('description');
            $table->string('attachment')->nullable(true);
            $table->tinyInteger('publish');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announcements');//untuk drop/delete table-announcements
    }
}
