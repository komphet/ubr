<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetupKind extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setup_kind',function(Blueprint $table){
            $table->increments('id')->index();
            $table->integer('idCate')->index();
            $table->integer('list');
            $table->string('title');
            $table->string('detail');
            $table->string('slug')->index();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
        DB::table('setup_kind')->insert([
            ['id' => '1','idCate' => '1','list' => '2','title' => 'คำนำหน้าชื่อ','detail' => '','slug' => '','active' => '1','created_at' => '2016-02-07 18:56:33','updated_at' => '2016-02-08 18:07:15'],
            ['id' => '2','idCate' => '1','list' => '1','title' => 'ครูประจำชั้น','detail' => '','slug' => '','active' => '1','created_at' => '2016-02-08 17:21:38','updated_at' => '2016-02-08 18:07:13'],
            ['id' => '3','idCate' => '1','list' => '0','title' => 'จัดการนักเรียน','detail' => '','slug' => '','active' => '1','created_at' => '2016-02-19 11:59:46','updated_at' => '2016-02-19 20:57:27']
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('setup_kind');
    }
}
