<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnRatingInTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->tinyInteger('pro_total_rating')->default(0)->comment('Tổng số đánh giá');
             $table->tinyInteger('pro_total_number')->default(0)->comment('Tổng số điểm đánh giá');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('pro_total_rating');
             $table->dropColumn('pro_total_number');
        });
    }
}
