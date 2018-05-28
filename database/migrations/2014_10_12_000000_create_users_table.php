<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name')->nullable(true);
            $table->string('address')->nullable(true);
            $table->string('tel')->nullable(true);
            $table->string('email');
            $table->string('position');
            $table->string('matricID')->nullable(true);
            $table->string('companyName')->nullable(true);
            $table->string('companyAdd')->nullable(true);
            $table->string('companyTel')->nullable(true);
            $table->string('companySV')->nullable(true);
            $table->string('emailSV')->nullable(true);
            $table->string('image')->nullable(true);
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
