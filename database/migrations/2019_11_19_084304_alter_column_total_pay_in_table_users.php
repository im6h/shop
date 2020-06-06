<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnTotalPayInTableUsers extends Migration
{
   
    public function up()
    {
        Schema::table('users',function(Blueprint $table){
            $table->integer('total_pay')->default(0);
        });
    }

    public function down()
    {
        Schema::table('users',function(Blueprint $table){
            $table->dropColumn('total_pay');
        });
    }
}
