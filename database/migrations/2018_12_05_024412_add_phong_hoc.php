<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhongHoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phan_cong_giang_day', function (Blueprint $table) {
            $table->integer('phong_hoc_id')->unsigned()->index();
            $table->foreign('phong_hoc_id')->references('id')->on('phong_hoc')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phan_cong_giang_day', function (Blueprint $table) {
        });
    }
}
