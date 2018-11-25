<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiangVienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giang_vien', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->string('chuyen_mon');
            $table->string('chuc_vu');
            $table->string('ngay_sinh');
            $table->integer('gioi_tinh');
            $table->string('dien_thoai');
            $table->integer('khoa_id')->unsigned()->index();
            $table->foreign('khoa_id')->references('id')->on('khoa')->onDelete('cascade');
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
        Schema::dropIfExists('giang_vien');
    }
}
