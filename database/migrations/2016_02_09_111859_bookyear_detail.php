<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BookyearDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("bookyear_detail",function(Blueprint $table){
            $table->increments("id");
            $table->integer("memberId");
            $table->string("aboutMe");
            $table->string("define");
            $table->string("likeSubject");
            $table->string("likeColor");
            $table->string("myFriend");
            $table->string("myTeacher");
            $table->string("tellFriend");
            $table->string("tellTeacher");
            $table->string("tellSchool");
            $table->string("motto");
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
        Schema::drop("bookyear_detail");
    }
}
