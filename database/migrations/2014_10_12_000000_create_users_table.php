<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no')->unique()->nullable();
            $table->string('name')->nullable();
            $table->string('head_img')->nullable();
            $table->string('tel')->nullable();
            $table->string('email')->nullable();
            $table->tinyInteger('status')->nullable();

            $table->string('weChat', 32)->nullable()->comment('openId');
            $table->string('weChat_name', 32)->nullable()->comment('姓名');
            $table->string('weChat_head', 255)->nullable()->comment('用户头像');

            $table->string('password');
            $table->ipAddress('ip')->nullable()->comment('上次登陆ip');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
