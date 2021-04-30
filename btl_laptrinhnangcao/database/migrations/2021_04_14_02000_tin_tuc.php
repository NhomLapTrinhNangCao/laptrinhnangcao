<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TinTuc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tin_tuc',function(Blueprint $table){
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('tieu_de',256);
            $table->string('tieu_de_khong_dau',256);
            $table->mediumText('tom_tat');
            $table->string('hinh',255);
            $table->longText('noi_dung');
            $table->integer('so_luot_xem');
            $table->timestamps();
            $table->integer('id_loai_tin')->unsigned();
            $table->bigInteger('id_user')->unsigned();

        });
        Schema::table('tin_tuc', function (Blueprint $table) {
            $table->foreign('id_loai_tin')->references('id')->on('loai_tin');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("tin_tuc");
    }
}
