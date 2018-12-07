<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDayOfWeekQlgd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phan_cong_giang_day', function (Blueprint $table) {
            $table->dropColumn('ngay_day');
            $table->date('ngay_bat_dau');
            $table->date('ngay_ket_thuc');
            $table->string('ngay_trong_tuan');
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
            $table->dropColumn('ngay_bat_dau');
            $table->dropColumn('ngay_ket_thuc');
            $table->dropColumn('ngay_trong_tuan');
            $table->date('ngay_day');
        });
    }
}
