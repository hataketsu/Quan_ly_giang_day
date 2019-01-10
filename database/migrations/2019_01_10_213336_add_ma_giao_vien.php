<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMaGiaoVien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('giang_vien', function (Blueprint $table) {
            $table->string('ma_so')->default('000');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('giang_vien', function (Blueprint $table) {
            $table->dropColumn('ma_so');
        });
    }
}
