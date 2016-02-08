<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Member extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member',function(Blueprint $table){
            $table->increments('id')->index();
            $table->string('username');
            $table->text('password');
            $table->string('email');
            $table->string('studenNo');
            $table->string('idCardNo');
            $table->string('titleName');
            $table->string('name');
            $table->string('lastname');
            $table->string('CRNo');//Class Room Number
            $table->string('room');
            $table->string('class');
            $table->text('address');
            $table->string('tel');
            $table->string('contact');
            $table->date('birthday');
            $table->string('gradYear');
            $table->text('remember_token');
            $table->boolean('active')->default(true);
            $table->boolean('admin')->default(false);
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
        Schema::drop('member');
    }
}
