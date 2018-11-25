<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHocPhanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoc_phan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->integer('khoa_dao_tao_id')->unsigned()->index();
            $table->foreign('khoa_dao_tao_id')->references('id')->on('khoa_dao_tao')->onDelete('cascade');
            $table->integer('mon_hoc_id')->unsigned()->index();
            $table->foreign('mon_hoc_id')->references('id')->on('mon_hoc')->onDelete('cascade');
            $table->integer('tin_chi_ly_thuyet');
            $table->integer('tin_chi_thuc_hanh');
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
        Schema::dropIfExists('hoc_phan');
    }
}
