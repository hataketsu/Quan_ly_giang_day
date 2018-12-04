<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToQlgd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phan_cong_giang_day', function (Blueprint $table) {
            $table->string('tiet_hoc');
            $table->date('ngay_day');
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
            $table->dropColumn('tiet_hoc');
            $table->dropColumn('ngay_day');
        });
    }
}
