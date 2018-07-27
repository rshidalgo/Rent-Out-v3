<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPostUnitDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function($table){
            $table->string('amenities');
            $table->string('inclusion');
            $table->string('unit_level');
            $table->string('unit_type');
            $table->string('city');
            $table->double('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function($table){
            $table->dropColumn('amenities');
            $table->dropColumn('inclusion');
            $table->dropColumn('unit_level');
            $table->dropColumn('unit_type');
            $table->dropColumn('city');
            $table->dropColumn('price');
        });
    }   
}
