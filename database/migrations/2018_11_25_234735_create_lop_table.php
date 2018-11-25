<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lop', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->integer('khoa_dao_tao_id')->unsigned()->index();
            $table->foreign('khoa_dao_tao_id')->references('id')->on('khoa_dao_tao')->onDelete('cascade');
            $table->integer('so_sinh_vien');
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
        Schema::dropIfExists('lop');
    }
}
