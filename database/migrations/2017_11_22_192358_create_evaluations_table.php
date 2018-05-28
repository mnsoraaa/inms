<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('studentID');
            $table->float('markLogbook', 11, 2)->nullable(true);
            $table->string('remarksLogbook')->nullable(true);
            $table->float('markPresent', 11, 2)->nullable(true);
            $table->string('remarksPresent')->nullable(true);
            $table->float('markInternship', 11, 2)->nullable(true);
            $table->string('remarksInternship')->nullable(true);
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
        Schema::dropIfExists('evaluations');
    }
}
