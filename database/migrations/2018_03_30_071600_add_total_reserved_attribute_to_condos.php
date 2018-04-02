<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTotalReservedAttributeToCondos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('condos', function($table){
            $table->integer('total_reserves');
            $table->integer('reserved');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('condos', function($table){
            $table->dropColumn('total_reserves');
            $table->dropColumn('reserved');
        });
    }
}
