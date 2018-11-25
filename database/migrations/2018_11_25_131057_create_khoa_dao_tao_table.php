<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhoaDaoTaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khoa_dao_tao', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->integer('nganh_id')->unsigned()->index();
            $table->foreign('nganh_id')->references('id')->on('nganh')->onDelete('cascade');
            $table->integer('nam_nhap');
            $table->integer('so_nam_dao_tao');
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
        Schema::dropIfExists('khoa_dao_tao');
    }
}
