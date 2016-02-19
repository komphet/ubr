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
        /*Schema::create('member',function(Blueprint $table){
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
        DB::table('member')->insert([
            ['id' => '1','username' => 'komphet5139','password' => '$2y$10$flviCp2lSAruy8rv2qfyDO5POjZoq1q9rWPoRWG4uIEsGxYdm5ItO','email' => 'komphetmeesab@hotmail.com','studenNo' => '13361','idCardNo' => '1400800090491','titleName' => 'นาย','name' => 'คมเพชร','lastname' => 'มีทรัพย์','CRNo' => '14','room' => '1','class' => '6','address' => '42 ม.11 ต.บ้านดง อ.อุบลรัตน์ จ.ขอนแก่น 40250','tel' => '66805356935','contact' => '','birthday' => '0000-00-00','gradYear' => '2558','remember_token' => 'wswQ7hEpcwTa6LrDyXwrLJNLL34ah58ipV58JQ4jut9gGMC3zlu7HrBOdVMK','active' => '1','admin' => '1','created_at' => '0000-00-00 00:00:00','updated_at' => '2016-02-09 07:42:47'],
            ['id' => '2','username' => 'attackpoint10','password' => '$2y$10$NDa/qFNhpMcx6w9VhVWNKudHVRX5gpFp6vj/10xcPdMLfExO7cIre','email' => 'autolovelye@gmail.com','studenNo' => '13025','idCardNo' => '1103703108841','titleName' => 'นาย','name' => 'สหภาพ','lastname' => 'คำสุข','CRNo' => '6','room' => '1','class' => '3','address' => '190 หมู่ 1 บ.บ่อนกเขา ต.เขื่อนอุบลรัตน์ อ.อุบลรัตน์ จ.ขอนแก่น 40250','tel' => '0953218832','contact' => 'Au To','birthday' => '0000-00-00','gradYear' => '2558','remember_token' => 'BYRzKx4c2eK9tIsGbLAZmkg7LM8pL0LzghmZeLk5XT85asKLADKIoszcaHyb','active' => '1','admin' => '1','created_at' => '0000-00-00 00:00:00','updated_at' => '2016-02-09 12:45:01'],
        ]);*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::drop('member');
    }
}
