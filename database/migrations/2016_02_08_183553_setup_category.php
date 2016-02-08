<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetupCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setup_category',function(Blueprint $table){
            $table->increments('id')->index();
            $table->integer('list');
            $table->string('title');
            $table->string('detail');
            $table->string('slug')->index();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
        DB::table('setup_category')->insert([
            ['id' => '1','list' => '0','title' => 'ทั่วไป','detail' => '','slug' => '','active' => '1','created_at' => '2016-02-07 18:56:23','updated_at' => '2016-02-07 18:56:23'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('setup_category');
    }
}
