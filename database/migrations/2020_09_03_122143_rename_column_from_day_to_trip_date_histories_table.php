<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnFromDayToTripDateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('histories')){
            return;
        }
        Schema::table('histories', function (Blueprint $table) {
            $table->renameColumn('day','trip_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('day_to_trip_date_histories', function (Blueprint $table) {
            //
        });
    }
}
