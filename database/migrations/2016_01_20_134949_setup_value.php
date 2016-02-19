<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetupValue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setup_value',function(Blueprint $table){
            $table->increments('id')->index();
            $table->integer('idCate')->index();
            $table->integer('idKind')->index();
            $table->integer('list');
            $table->string('title');
            $table->string('detail');
            $table->string('slug')->index();
            $table->string('input');
            $table->text('value');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
        DB::table('setup_value')->insert([
              ['id' => '1','idCate' => '1','idKind' => '1','list' => '1','title' => 'นาย','detail' => '','slug' => 'TITLE-NAME-MR','input' => 'text','value' => 'Mr.','active' => '1','created_at' => '2016-02-07 18:57:21','updated_at' => '2016-02-07 18:58:07'],
              ['id' => '2','idCate' => '1','idKind' => '1','list' => '2','title' => 'นางสาว','detail' => '','slug' => 'TITLE-NAME-MISS','input' => 'text','value' => 'Miss','active' => '1','created_at' => '2016-02-07 18:58:20','updated_at' => '2016-02-08 17:50:55'],
              ['id' => '3','idCate' => '1','idKind' => '1','list' => '3','title' => 'เด็กชาย','detail' => '','slug' => 'TITLE-NAME-MASTER','input' => 'text','value' => 'Master.','active' => '1','created_at' => '2016-02-07 18:58:43','updated_at' => '2016-02-08 17:51:20'],
              ['id' => '4','idCate' => '1','idKind' => '2','list' => '0','title' => '6','detail' => 'คุณครูภัทราภรณ์ ลิมป์นิศากร,คุณครูจุฑารัตน์ สมมาตย์','slug' => 'CLASS-TEACHER-6-1','input' => 'text','value' => '1','active' => '1','created_at' => '2016-02-08 17:25:31','updated_at' => '2016-02-08 17:34:41'],
              ['id' => '5','idCate' => '1','idKind' => '2','list' => '0','title' => '6','detail' => 'คุณครูจันเพ็ญ ไชยะเวช,คุณครูชนิกานต์ คะนนท์','slug' => 'CLASS-TEACHER-6-2','input' => 'text','value' => '2','active' => '1','created_at' => '2016-02-08 17:26:34','updated_at' => '2016-02-08 17:34:47'],
              ['id' => '6','idCate' => '1','idKind' => '2','list' => '0','title' => '6','detail' => 'คุณครูเวียงแก้ว สะอาด,คุณครูภัทรา การนา','slug' => 'CLASS-TEACHER-6-3','input' => 'text','value' => '3','active' => '1','created_at' => '2016-02-08 17:27:11','updated_at' => '2016-02-08 17:34:48'],
              ['id' => '7','idCate' => '1','idKind' => '2','list' => '0','title' => '6','detail' => 'คุณครูวิลาสินี พรรคพิง,คุณครูรัตนา กนกหงษา','slug' => 'CLASS-TEACHER-6-4','input' => 'text','value' => '4','active' => '1','created_at' => '2016-02-08 17:27:47','updated_at' => '2016-02-08 17:34:50'],
              ['id' => '8','idCate' => '1','idKind' => '2','list' => '0','title' => '6','detail' => 'คุณครูอรณพ คำแสน,คุณครูธัญญา ศรีสูงเนิน','slug' => 'CLASS-TEACHER-6-5','input' => 'text','value' => '5','active' => '1','created_at' => '2016-02-08 17:28:20','updated_at' => '2016-02-08 17:34:53'],
              ['id' => '9','idCate' => '1','idKind' => '2','list' => '0','title' => '3','detail' => 'คุณครูพิมผกา พิมพุฒิ, คุณครูพัชราภรณ์ เพิ่มยินดี','slug' => 'CLASS-TEACHER-3-1','input' => 'text','value' => '1','active' => '1','created_at' => '2016-02-08 17:29:30','updated_at' => '2016-02-08 17:35:03'],
              ['id' => '10','idCate' => '1','idKind' => '2','list' => '0','title' => '3','detail' => 'คุณครูชนิดาภา โสหา,คุณครูอรุณ บุญชู','slug' => 'CLASS-TEACHER-3-2','input' => 'text','value' => '2','active' => '1','created_at' => '2016-02-08 17:30:13','updated_at' => '2016-02-08 17:35:07'],
              ['id' => '11','idCate' => '1','idKind' => '2','list' => '0','title' => '3','detail' => 'คุณครูสมบูรณ์ วงวิลาศ,คุณครูปริญญา ศรีโบราณ,คุณครูธัญลักณ์ ฐานะ','slug' => 'CLASS-TEACHER-3-3','input' => 'text','value' => '3','active' => '1','created_at' => '2016-02-08 17:30:46','updated_at' => '2016-02-08 17:35:08'],
              ['id' => '12','idCate' => '1','idKind' => '2','list' => '0','title' => '3','detail' => 'คุณครูอมร ศรีหาโมก,คุณครูเนตรนภา คลังกลาง','slug' => 'CLASS-TEACHER-3-4','input' => 'text','value' => '4','active' => '1','created_at' => '2016-02-08 17:31:55','updated_at' => '2016-02-08 17:35:10'],
              ['id' => '13','idCate' => '1','idKind' => '2','list' => '0','title' => '3','detail' => 'คุณครูสุวิมล โคกคาน,คุณครูกานดา เรืองวานิช,คุณครูพงศกร สุวรรณศรี','slug' => 'CLASS-TEACHER-3-5','input' => 'text','value' => '5','active' => '1','created_at' => '2016-02-08 17:33:16','updated_at' => '2016-02-08 17:35:11'],
              ['id' => '14','idCate' => '1','idKind' => '2','list' => '0','title' => '3','detail' => 'คุณครูประไพ สุโพธิ์ชัย,คุณครูปาริฉัตต์ ไวคำ','slug' => 'CLASS-TEACHER-3-6','input' => 'text','value' => '6','active' => '1','created_at' => '2016-02-08 17:33:55','updated_at' => '2016-02-08 17:35:14'],
              ['id' => '17','idCate' => '1','idKind' => '1','list' => '4','title' => 'เด็กหญิง','detail' => '','slug' => 'TITLE-NAME-MISS-G','input' => 'text','value' => '์Miss.','active' => '1','created_at' => '2016-02-08 17:51:55','updated_at' => '2016-02-08 17:52:38'],
              ['id' => '18','idCate' => '1','idKind' => '3','list' => '0','title' => 'จำนวนนักเรียน/หน้า','detail' => 'Default','slug' => 'STUDEN-LIST-LIMIT','input' => 'text','value' => '30','active' => '1','created_at' => '2016-02-19 12:00:35','updated_at' => '2016-02-19 20:41:03']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('setup_value');
    }
}
