<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnLatitudeLongitudeLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('locations')){
            return;
        }
        Schema::table('locations',function(Blueprint $table){
            $table->float('latitude',10,6)->after('address')->comment('緯度');
            $table->float('longitude',10,6)->after('address')->comment('軽度');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
