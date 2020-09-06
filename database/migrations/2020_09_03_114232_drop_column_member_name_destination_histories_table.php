<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnMemberNameDestinationHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        if(Schema::hasTable('histories')){
            return;
        }
        Schema::table('histories',function(Blueprint $table){
            $table->dropColumn('member_name');
            $table->dropColumn('destination');
        });
    }
}
