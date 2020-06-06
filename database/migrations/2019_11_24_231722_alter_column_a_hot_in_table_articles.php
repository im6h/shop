<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnAHotInTableArticles extends Migration
{
   public function up()
    {
        Schema::table('articles',function(Blueprint $table){
            $table->tinyInteger('a_hot')->default(0)->index();
        });
    }

    public function down()
    {
        Schema::table('articles',function(Blueprint $table){
            $table->dropColumn('a_hot');
        });
    }
}
