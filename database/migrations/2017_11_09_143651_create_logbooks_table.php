<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logbooks', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('studentID');
            $table->dateTime('date');
            $table->string('objective')->nullable(true);
            $table->string('task')->nullable(true);;
            $table->string('newknowledge')->nullable(true);
            $table->string('attachment')->nullable(true);
            $table->tinyInteger('publish');
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
        Schema::dropIfExists('logbooks');
    }
}
