<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMonth extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('setup_value')->insert([
              ['id' => '19','idCate' => '1','idKind' => '2','list' => '0','title' => '0','detail' => 'ผู้ดูแลระบบ','slug' => 'CLASS-TEACHER-0-0','input' => 'text','value' => '0','active' => '1','created_at' => '2016-02-20 11:54:35','updated_at' => '2016-02-20 11:54:35'],
              ['id' => '20','idCate' => '1','idKind' => '4','list' => '0','title' => 'มกราคม','detail' => '','slug' => '','input' => 'text','value' => '1','active' => '1','created_at' => '2016-02-21 17:27:38','updated_at' => '2016-02-21 17:27:38'],
              ['id' => '21','idCate' => '1','idKind' => '4','list' => '0','title' => 'กุมภาพันธ์','detail' => '','slug' => '','input' => 'text','value' => '2','active' => '1','created_at' => '2016-02-21 17:27:58','updated_at' => '2016-02-21 17:27:58'],
              ['id' => '22','idCate' => '1','idKind' => '4','list' => '0','title' => 'มีนาคม','detail' => '','slug' => '','input' => 'text','value' => '3','active' => '1','created_at' => '2016-02-21 17:28:07','updated_at' => '2016-02-21 17:28:07'],
              ['id' => '23','idCate' => '1','idKind' => '4','list' => '0','title' => 'เมษายน','detail' => '','slug' => '','input' => 'text','value' => '4','active' => '1','created_at' => '2016-02-21 17:28:13','updated_at' => '2016-02-21 17:28:13'],
              ['id' => '24','idCate' => '1','idKind' => '4','list' => '0','title' => 'พฤษภาคม','detail' => '','slug' => '','input' => 'text','value' => '5','active' => '1','created_at' => '2016-02-21 17:28:20','updated_at' => '2016-02-21 17:28:20'],
              ['id' => '25','idCate' => '1','idKind' => '4','list' => '0','title' => 'มิถุนายน','detail' => '','slug' => '','input' => 'text','value' => '6','active' => '1','created_at' => '2016-02-21 17:28:27','updated_at' => '2016-02-21 17:28:27'],
              ['id' => '26','idCate' => '1','idKind' => '4','list' => '0','title' => 'กรกฎาคม','detail' => '','slug' => '','input' => 'text','value' => '7','active' => '1','created_at' => '2016-02-21 17:28:33','updated_at' => '2016-02-21 17:28:33'],
              ['id' => '27','idCate' => '1','idKind' => '4','list' => '0','title' => 'สิงหาคม','detail' => '','slug' => '','input' => 'text','value' => '8','active' => '1','created_at' => '2016-02-21 17:28:38','updated_at' => '2016-02-21 17:28:38'],
              ['id' => '28','idCate' => '1','idKind' => '4','list' => '0','title' => 'กันยายน','detail' => '','slug' => '','input' => 'text','value' => '9','active' => '1','created_at' => '2016-02-21 17:28:50','updated_at' => '2016-02-21 17:28:50'],
              ['id' => '29','idCate' => '1','idKind' => '4','list' => '0','title' => 'ตุลาคม','detail' => '','slug' => '','input' => 'text','value' => '10','active' => '1','created_at' => '2016-02-21 17:28:57','updated_at' => '2016-02-21 17:28:57'],
              ['id' => '30','idCate' => '1','idKind' => '4','list' => '0','title' => 'พฤศจิกายน','detail' => '','slug' => '','input' => 'text','value' => '11','active' => '1','created_at' => '2016-02-21 17:29:05','updated_at' => '2016-02-21 17:29:05'],
              ['id' => '31','idCate' => '1','idKind' => '4','list' => '0','title' => 'ธันวาคม','detail' => '','slug' => '','input' => 'text','value' => '12','active' => '1','created_at' => '2016-02-21 17:29:11','updated_at' => '2016-02-21 17:29:11']
        ]);
        DB::table('setup_kind')->insert([
            ['id' => '4','idCate' => '1','list' => '3','title' => 'เดือน','detail' => '','slug' => '','active' => '1','created_at' => '2016-02-21 17:26:21','updated_at' => '2016-02-21 17:26:45']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
