<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnYearbook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookyear_detail', function ($table) {
            $table->dropColumn('aboutMe');
            $table->string('aboutMe1')->after('memberId');
            $table->string('aboutMe2')->after('aboutMe1');
            $table->string('link')->after('motto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookyear_detail', function ($table) {
            $table->dropColumn('link');
            $table->dropColumn('aboutMe1');
            $table->dropColumn('aboutMe2');
            $table->string('aboutMe')->after('memberId');
        });
    }
}
