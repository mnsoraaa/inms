<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndustrialSVIDColumnAssignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assigns', function (Blueprint $table) {
            //
            $table->integer('industrialSVID')->nullable(true)->after('facultySVID');
            DB::statement('ALTER TABLE `assigns` MODIFY `facultySVID` INTEGER NULL;');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assigns', function (Blueprint $table) {
            //
            $table->dropColumn('industrialSVID');
            DB::statement('ALTER TABLE `assigns` MODIFY `facultySVID` INTEGER NOT NULL;');
        });
    }
}
