<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->char('phone')->nullable();
            $table->string('avatar')->nullable();
            $table->tinyInteger('active')->default(1)->index();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
