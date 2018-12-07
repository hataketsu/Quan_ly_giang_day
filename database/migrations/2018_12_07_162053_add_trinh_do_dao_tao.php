<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTrinhDoDaoTao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nganh', function (Blueprint $table) {
            $table->string('dao_tao_dh');
            $table->string('dao_tao_cd');
            $table->string('dao_tao_tc');
            $table->string('dao_tao_nghe');
            $table->string('dao_tao_trc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nganh', function (Blueprint $table) {
            $table->dropColumn('dao_tao_dh');
            $table->dropColumn('dao_tao_cd');
            $table->dropColumn('dao_tao_tc');
            $table->dropColumn('dao_tao_nghe');
            $table->dropColumn('dao_tao_trc');
        });
    }
}
