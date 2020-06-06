<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pro_name')->nullable();
            $table->string('pro_slug')->index();
            $table->integer('pro_catogery_id')->index()->default(0);
            $table->integer('pro_price')->default(0);
            $table->integer('pro_author_id')->default(0)->index();
            $table->tinyInteger('pro_sale')->default(0);
            $table->tinyInteger('pro_active')->default(1)->index();
            $table->tinyInteger('pro_hot')->default(0);
             $table->integer('pro_view')->default(0);
            $table->string('pro_description')->nullable();
            $table->string('pro_avatar')->nullable();
            $table->string('pro_description_seo')->nullable();
            $table->string('pro_keyword_seo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
