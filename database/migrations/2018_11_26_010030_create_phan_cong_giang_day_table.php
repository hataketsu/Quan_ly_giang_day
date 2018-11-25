<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhanCongGiangDayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phan_cong_giang_day', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('giang_vien_id')->unsigned()->index();
            $table->foreign('giang_vien_id')->references('id')->on('giang_vien')->onDelete('cascade');
            $table->integer('hoc_phan_id')->unsigned()->index();
            $table->foreign('hoc_phan_id')->references('id')->on('hoc_phan')->onDelete('cascade');
            $table->integer('lop_id')->unsigned()->index();
            $table->foreign('lop_id')->references('id')->on('lop')->onDelete('cascade');
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
        Schema::dropIfExists('phan_cong_giang_day');
    }
}
