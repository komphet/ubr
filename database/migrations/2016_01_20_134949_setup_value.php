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
