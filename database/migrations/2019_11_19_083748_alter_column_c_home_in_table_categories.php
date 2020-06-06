<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnCHomeInTableCategories extends Migration
{
    public function up()
    {
        Schema::table('categories',function(Blueprint $table){
            $table->tinyInteger('c_home')->default(0)->index();
        });
    }

    public function down()
    {
        Schema::table('categories',function(Blueprint $table){
            $table->dropColumn('c_home');
        });
    }
}
