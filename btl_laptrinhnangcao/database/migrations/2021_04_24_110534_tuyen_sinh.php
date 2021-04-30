<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TuyenSinh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuyen_sinh',function(Blueprint $table){
            $table->increments('id');
            $table->string('tieu_de',255);
            $table->string('tieu_de_khong_dau',255);
            $table->mediumText('tom_tat');
            $table->string('hinh',255);
            $table->longText('noi_dung');
            $table->integer('so_luot_xem');
            $table->string('ma_tuyen_sinh',255);
            $table->integer('so_chi_tieu');
            $table->integer('thoi_gian_dao_tao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("tuyen_sinh");
    }
}
